<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function category($categorySlug)
    {
        $category = Category::query()->with('products')->where('slug', $categorySlug)->first();
        return view('category', compact('category'));
    }


}
