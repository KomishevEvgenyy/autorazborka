@extends('layouts/main')

@section('title-block', $category->brand)

@section('content')
    <h1>
        Запчасти для автомобля {{ $category->name }}
    </h1>

    <div class="row">
        @foreach($category->products as $product)
            @include('card', compact('product'))
        @endforeach
    </div>
@endsection
