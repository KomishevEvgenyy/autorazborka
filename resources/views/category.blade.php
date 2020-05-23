@extends('layouts/main')

@section('title-block', $category->brand)

@section('content')
    <h1>
        Страницы определенной категории
    </h1>

    <p> {{ $category->brand }} </p>

@endsection
