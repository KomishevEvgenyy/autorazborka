@extends('layouts/main')

@section('title-block', 'Б/у автомобили')

@section('content')
    <h1>
        Б/у автомобили
    </h1>

        @foreach($carsSale as $car)
        <div class="media mt-3">
            <img src="{{ Storage::url( $car->image1)}}" class="mr-3" alt="Фото автомобиля">
            <div class="media-body">
                <h5 class="mt-0">{{ $car->name }}</h5>
                <span>{{ $car->description }}</span>
                <p>{{ $car->price }}</p>
            </div>
        </div>
        @endforeach


@endsection
