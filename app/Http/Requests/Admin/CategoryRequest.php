<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
//        dd($this->category->id);
        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3',
            'slug' => 'required|string|unique:categories,slug,'. (isset($this->category) ? $this->category->id : ''),
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.min' => 'Минимум должно быть :min символа',
            'title.max' => 'Максимум должно быть :max символа',
            'description.required' => 'Это поле обязательно для заполнения',
            'description.min' => 'Минимум должно быть :min символа',
            'slug.required' => 'Это поле обязательно для заполнения',
            'slug.unique' => 'Это поле должно быть уникальное',
            'image.image' => 'Это файл должен быть картинкой',
            'image.mimes' => 'Этот тип нельзя загрузить',
            'image.max' => 'Максимальный размер картинки :max kb',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->slug ?? Str::slug($this->title)
        ]);
    }
}
