@extends('layouts/main')

@section('title-block', 'Б/у автомобили')

@section('content')
    <h1 class="text-center">
        Б/у автомобили
    </h1>
    <br/>
        @forelse($carsSale as $car)
        <div class="media mt-0 mb-4 img-thumbnail">
            <img width="350px" src="{{ URL::asset('/storage/'.$car->image)}}" class="mr-3" alt="Фото автомобиля">
            <div class="media-body">
                <h5 class="mt-0">{{ $car->name }}</h5>
                <p>{{ $car->description }}</p>
                <h6>Цена: {{ $car->price }} USD</h6>
            </div>
        </div>
        @empty
            <h5 class="text-center">На данный момент в продаже отсутствуют автомобили. Заходите позже.</h5>
        @endforelse
@endsection
