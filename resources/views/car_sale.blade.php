@extends('layouts/main')

@section('title-block', 'Б/у автомобили')

@section('content')
    <h1>
        Б/у автомобили
    </h1>
    @isset($car_sale)
        @foreach($car_sale as $car)
        <div class="media mt-3">
            <img src="{{ Storage::url( $car->image1)}}" class="mr-3" alt="Фото автомобиля">
            <div class="media-body">
                <h5 class="mt-0">{{ $car->name }}</h5>
                <span>{{ $car->description }}</span>
                <p>{{ $car->price }}</p>
            </div>
        </div>
        @endforeach
    @else
        <h3> На данный момент в продаже нет б/у автомобилей </h3>
    @endisset

@endsection
