@extends('layouts.admin_main')
@section('title', 'Админка:продукты')
@section('content')
    <main>
        <div class="container">
            <h1 class="mt-5 text-center">Продукты {{ $product->title }}</h1>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">

                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>{{ $product->title }}</td>
                    </tr>
                    <tr>
                        <td>Картинка</td>
                        <td><img src="{{  asset('storage/'. $product->image) }}" alt="{{ $product->title }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <td>Контент</td>
                        <td>{{ $product->content }}</td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <td>Категория</td>
                        <td>{{ $product->category->title }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
