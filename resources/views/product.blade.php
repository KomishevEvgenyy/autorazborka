@extends('layouts/main')

@section('title-block', 'Подробнее')

@section('content')
    <div class="container">
        @isset($product)
        <div class="starter-template text-left">
            <h1>{{ $product->name }}</h1>
            <h2>{{ $product->category->name }}</h2>
            <p>Цена: <b>{{ $product->price }} грн.</b></p>
            <p><img src="{{ Storage::url( $product->image) }}"></p>
            <p class="pt-4">{{ $product->description }}</p>

            <form action="{{ route('basket-add', $product) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
            </form>
        </div>
        @else
            <h3>Товар отсутствует</h3>
        @endisset
    </div>
@endsection
