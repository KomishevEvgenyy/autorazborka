@extends('layouts/main')

@section('title-block', $category->brand)

@section('content')
    <h1>
        Страницы определенной категории
    </h1>

    <p> {{ $category->brand }} </p>

    <div class="row">
        @foreach($category->products as $product)
            @include('card', compact('product'))
        @endforeach
    </div>


@endsection
