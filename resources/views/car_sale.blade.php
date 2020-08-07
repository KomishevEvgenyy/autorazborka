@extends('layouts/main')

@section('title-block', 'Б/у автомобили')

@section('content')
    <h1 class="text-center">
        Б/у автомобили
    </h1>
    <br/>
        @foreach($carsSale as $car)
        <div class="media mt-0 mb-4 img-thumbnail">
            <img width="350px" src="{{ Storage::url( $car->image)}}" class="mr-3" alt="Фото автомобиля">
            <div class="media-body">
                <h5 class="mt-0">{{ $car->name }}</h5>
                <p>{{ $car->description }}</p>
                <h6>Цена: {{ $car->price }} грн.</h6>
            </div>
        </div>
        @endforeach
@endsection
