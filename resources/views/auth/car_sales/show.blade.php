@extends('auth.layouts.app')

@section('title-block', 'Автомобиль'. $carSale->name)

@section('content')
    <div class="col-md-12">
        <h1>Автомобиль {{$carSale->name}}</h1>
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
                <td>Марка автомобиля</td>
                <td>{{ $carSale->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $carSale->description }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $carSale->price }}</td>
            </tr>
            <tr>
                <td>Фото</td>
                <td>
                    <img width="350px" src="{{ URL::asset('/storage/'.$carSale->image) }}">
                </td>
                <!-- URL::asset('/storage/'.$category->code).'.jpg' -->
            </tr>
            <tr>
                <td>Колличество автомобилей</td>
                <td>{{ $carSale->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
