@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <main>
        <div class="container">
            <h1 class="mt-5 text-center">Категории</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($category->products as $product)
                    <div class="col py-5">
                        <div class="card shadow-sm">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}"
                                 alt="{{ $product->title }}">

                            <div class="card-body">
                                <h4 class="card-text text-center py-3">{{ $product->title }}</h4>
                                <p class="py-2 text-center">{{ $product->description }}</p>
                                <div class="d-flex justify-content-around align-items-center">

                                    <button type="button" class="btn btn-outline-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $category->slug, $product->slug }}">
                                        Подробнее
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal{{ $category->slug, $product->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $product->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}"
                                         alt="{{ $product->title }}" class="img-fluid mb-3">
                                    <p><strong>Категория:</strong> {{ $product->category->title }}</p>
                                    <p>{{ $product->description }}</p>
                                    <p>{{ $product->content }}</p>
                                    <p><strong>Цена:</strong> {{ $product->price }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
