@extends('auth.layouts.app')

@section('title-block', 'Категория'. $product->name)

@section('content')
    <div class="col-md-12">
        <h1>Товар {{$product->name}}</h1>
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
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Марка автомобиля</td>
                @foreach($categories as $category)
                    @isset($product)
                        @if($product->category_id == $category->id)
                            <td>{{ $category->name }}</td>
                        @endif
                    @endisset
                @endforeach
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td>
                    <img width="150" src="{{ Storage::url( $product->image) }}">
                </td>
            </tr>
            <tr>
                <td>Колличество товаров</td>
                <td>{{ $product->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
