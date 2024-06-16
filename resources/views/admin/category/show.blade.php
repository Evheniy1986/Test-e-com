@extends('layouts.admin_main')
@section('title', 'Админка:категориия')
@section('content')
    <main>
        <div class="container">
            <h1 class="mt-5 text-center">Категория {{ $category->title }}</h1>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">

                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>{{ $category->title }}</td>
                    </tr>
                    <tr>
                        <td>Картинка</td>
                        <td><img src="{{  asset('storage/'. $category->image) }}" alt="{{ $category->title }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td>{{ $category->description }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
