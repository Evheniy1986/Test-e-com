@extends('layouts.admin_main')
@section('title', 'Админка')
@section('content')
    <main>
        <div class="container">
            <h1 class="mt-5 text-center">Админ панель</h1>
            <table class="table table-hover text-nowrap mt-5">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Картинка</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th rowspan="3" scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>
                            <img style="width: 70px; height: 70px;" src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}" alt="{{ $category->title }}">
                        </td>
                        <td><a href="{{ route('admin.categories.show', $category) }}">{{ $category->title }}</a></td>
                        <td>{{ $category->description }}</td>
                        <td >
                            <a class="btn btn-info" href="{{ route('admin.categories.edit', $category) }}">Редактировать</a>

                            <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <a class="btn btn-outline-success mt-4" href="{{ route('admin.categories.create') }}">Создать категорию</a>
        </div>
    </main>
@endsection
