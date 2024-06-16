@extends('layouts.admin_main')
@section('title', 'Админка:продукты')
@section('content')
    <main>
        <div class="container">
                <h1 class="mt-5 text-center">{{ isset($product) ? 'Редактировать продукты' : 'Создать продукты' }}</h1>
            @isset($product)
                <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @else
                        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @endisset
                            <div class="col-md-6 m-auto mt-5">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ isset($product) ? $product->title : old('title') }}">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description" rows="3">{{ isset($product) ? $product->description : old('description') }}</textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror"
                                              name="content" rows="3">{{ isset($product) ? $product->content : old('content') }}</textarea>
                                </div>
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ isset($product) ? $product->slug : old('slug') }}">
                                </div>
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror"
                                           value="{{ isset($product) ? $product->price : old('price') }}">
                                </div>
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @isset($product)
                                <div>
                                    <img style="height: 70px; width: 70px;" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="">
                                </div>
                                @endisset
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image"
                                           class="form-control @error('image') is-invalid @enderror"
                                           value="{{ isset($product) ? $product->image : old('image') }}">
                                </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category_id" aria-label="Default select example">
                                        <option selected>Выберите категорию</option>
                                        @foreach($categories as $category)
                                        <option {{ isset($product) && $product->category->id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-3 text-end">
                                    <button class="btn btn-success mt-3" type="submit">{{ isset($product) ? 'Редактировать продукты' : 'Создать продукты'}}</button>
                                </div>
                            </div>
                        </form>
        </div>
    </main>
@endsection
