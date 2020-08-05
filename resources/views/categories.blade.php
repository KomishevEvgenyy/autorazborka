@extends('layouts/main')

@section('title-block', 'Категории')

@section('content')
    <div class="mb-5">
        <h1 class="text-center">
            Выберите марку вашего автомобиля
        </h1>
    </div>
        <div class="row ml-5">
            @forelse($categories as $category)
                <a href="{{ route('category', $category->code) }}">
                    <img width="180" src="{{ Storage::url( $category->image) }}">
                </a>
            @empty
                <h3>Категории отсутствуют</h3>
            @endforelse
        </div>
@endsection
