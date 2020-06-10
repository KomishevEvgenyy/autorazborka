@extends('auth.layouts.app')

@section('title-block', 'Категория'. $category->name)

@section('content')
    <div class="col-md-12">
        <h1>Категория {{$category->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>Поле</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>id</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Марка автомобиля</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td>
                    <img width="150" src="{{ URL::asset('/storage/'.$category->code).'.jpg' }}">
                </td>
            </tr>
            <tr>
                <td>Колличество товаров</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
