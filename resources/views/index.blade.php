@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <main>
        <div class="container">
            <h1 class="mt-5 text-center">Категории</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($categories as $category)
                <div class="col py-5">
                    <div class="card shadow-sm">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}" alt="{{ $category->title }}">

                        <div class="card-body">
                            <a class="" href="{{ route('category', $category->slug) }}"><h4 class="text-center py-2">{{ $category->title }}</h4></a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
