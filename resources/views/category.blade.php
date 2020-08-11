@extends('layouts/main')

@section('title-block', $category->name)

@section('content')
    <div class="mb-5">
        <h1 class="text-center font-weight-bold">
            Запчасти для автомобля {{ $category->name }}
        </h1>
    </div>
    <div class="row">
        @forelse($category->products as $product)
            @include('layouts.card', compact('product'))
        @empty
            <div class="text-center">
                <h5>На данный момент детали для автомобиля {{ $category->name }} отсутствуют.
                    Ожидайте обновление ассортимента товаров.</h5>
            </div>
        @endforelse
    </div>
@endsection
