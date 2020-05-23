@extends('layouts/main')

@section('title-block') Авторазборка Запорожье - {{ $category->brand }} @endsection

@section('content')
    <h1>
        Страницы с категорией
    </h1>
    <p>
        {{ $category->brand }}
    </p>
@endsection
