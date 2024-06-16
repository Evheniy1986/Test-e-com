<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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
        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'price' => 'required|numeric|min:0',
            'slug' => 'required|string|unique:products,slug,'. (isset($this->product) ? $this->product->id : ''),
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
            'category_id' => 'required|exists:categories,id'
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
            'description.max' => 'Максимум должно быть :max символа',
            'content.required' => 'Это поле обязательно для заполнения',
            'content.min' => 'Минимум должно быть :min символа',
            'price.required' => 'Это поле обязательно для заполнения',
            'price.numeric' => 'Здесь должно быть число',
            'slug.required' => 'Это поле обязательно для заполнения',
            'slug.unique' => 'Это поле должно быть уникальное',
            'image.image' => 'Это файл должен быть картинкой',
            'image.mimes' => 'Этот тип нельзя загрузить',
            'image.max' => 'Максимальный размер картинки :max kb',
            'category_id.required' => 'Это поле обязательно для заполнения',
            'category_id.exists' => 'Вам нужно выбрать категорию из списка',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->slug ?? Str::slug($this->title)
        ]);
    }
}
