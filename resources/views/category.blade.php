@extends('layouts/main')

@section('title-block', $category->brand)

@section('content')
    <h1>
        Запчасти для автомобля {{ $category->name }}
    </h1>

    <div class="row">
        @forelse($category->products as $product)
            @include('layouts.card', compact('product'))
        @empty
            <h3>На данный момент товары данной категории отсутствуют</h3>
        @endforelse
    </div>
@endsection
