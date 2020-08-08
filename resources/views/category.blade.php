@extends('layouts/main')

@section('title-block', $category->name)

@section('content')
    <div class="text-center">
        <h1>
            Запчасти для автомобля {{ $category->name }}
        </h1>
    </div>
    <div class="row">
        @forelse($category->products as $product)
            @include('layouts.card', compact('product'))
        @empty
            <div class="text-center">
                <h3>На данный момент товары данной категории отсутствуют</h3>
            </div>
        @endforelse
    </div>
@endsection
