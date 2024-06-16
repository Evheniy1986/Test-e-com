<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('/categories', 'public');
        }

        Category::query()->create($data);
        return to_route('admin.categories.index')->with('success', 'Вы создали новую категорию');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if (isset($category->image) && file_exists(public_path('storage/' . $category->image))) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = $request->file('image')->store('/categories', 'public');
        }
        $data['slug'] = Str::slug($request->title);
        if (Category::query()->where('id', '!=', $category->id)->where('slug', $data['slug'])->exists()) {
            return redirect()->back()->withErrors(['slug' => 'Slug должен быть уникальным, такой slug уже существует.'])->withInput();
        }
        $category->update($data);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (isset($category->image)) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', "категория $category->title успешно удалена");
    }
}
