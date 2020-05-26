@extends('layouts/main')

@section('title-block', 'Товар')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>{{ $product->name }}</h1>
            <h2>{{ $product->category->name }}</h2>
            <p>Цена: <b>{{ $product->price }} грн.</b></p>
            <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
            <p>{{ $product->description }}</p>

            <form action="{{ route('basket-add', $product) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

                <input type="hidden" name="_token" value="nboNrCcGlhX72imNVVIHfGC97xVAWFPx0KtdWuAo">
            </form>
        </div>
    </div>
@endsection
