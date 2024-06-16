@extends('layouts.admin_main')
@section('title', 'Админка')
@section('content')
    <main>
        <div class="container">
            <h1 class="mt-5 text-center">Продукты</h1>
            <table class="table table-hover text-nowrap mt-5">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Картинка</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Контент</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Категория</th>
                    <th rowspan="3" scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>
                            <img style="width: 70px; height: 70px;" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="{{ $product->title }}">
                        </td>
                        <td><a href="{{ route('admin.products.show', $product) }}">{!! wordwrap($product->title,30, "<br />\n", true) !!}</a></td>
                        <td>{!! wordwrap($product->description,30, "<br />\n", true) !!}</td>
                        <td>{!! wordwrap($product->content,30, "<br />\n", true) !!}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td >
                            <a class="btn btn-info" href="{{ route('admin.products.edit', $product) }}">Редактировать</a>

                            <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <a class="btn btn-outline-success m-4" href="{{ route('admin.products.create') }}">Создать товар</a>
        </div>
    </main>
@endsection
