@extends('layouts/main')

@section('title-block', $category->brand)

@section('content')
    @isset($category)
    <h1>
        Запчасти для автомобля {{ $category->name }}
    </h1>

    <div class="row">
        @foreach($category->products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
    @else
    <h3>На данный момент товары данной категории отсутствуют</h3>
    @endisset
@endsection
