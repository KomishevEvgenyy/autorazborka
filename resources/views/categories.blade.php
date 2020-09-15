@extends('layouts/main')

@section('title-block', 'Категории')

@section('content')
    <div class="mb-5">
        <h1 class="text-center font-weight-bold">
            Выберите марку вашего автомобиля
        </h1>
    </div>
    <div class="row ml-5">
        @forelse($categories as $category)
            <a href="{{ route('category', $category->code) }}" class="mx-2 my-1">
                <img height="160px" src="{{ URL::asset('/storage/'.$category->image) }}" alt="Фото бренда автомобиля">
            </a>
        @empty
            <h5 class="text-center">На данный момент категории товаров отсутствуют. Приносим свои извинения.</h5>
        @endforelse
    </div>
@endsection
