@extends('layouts/main')
@section('title-block', 'Главная')

@section('content')
    <h1>
        Сайт авторазборки
    </h1>
    <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
@endsection
