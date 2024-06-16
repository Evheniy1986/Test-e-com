@extends('layouts.admin_main')
@section('title', 'Админка:категории')
@section('content')
    <main>
        <div class="container">
                <h1 class="mt-5 text-center">{{ isset($category) ? 'Редактировать категорию' : 'Создать категорию' }}</h1>
            @isset($category)
                <form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @else
                        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @endisset
                            <div class="col-md-6 m-auto mt-5">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ isset($category) ? $category->title : old('title') }}">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description" rows="3">{{ isset($category) ? $category->description : old('description') }}</textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ isset($category) ? $category->slug : old('slug') }}">
                                </div>
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @isset($category)
                                <div>
                                    <img style="height: 70px; width: 70px;" src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}" alt="">
                                </div>
                                @endisset
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image"
                                           class="form-control @error('image') is-invalid @enderror"
                                           value="{{ isset($category) ? $category->image : old('image') }}">
                                </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-3 text-end">
                                    <button class="btn btn-success mt-3" type="submit">{{ isset($category) ? 'Редактировать категорию' : 'Создать категорию'}}</button>
                                </div>
                            </div>
                        </form>
        </div>
    </main>
@endsection
