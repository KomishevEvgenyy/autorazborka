@extends('layouts/main')

@section('title-block') Авторазборка Запорожье - Товар @endsection

@section('content')
    <div class="container">
        <h1>Страница для отображения определенного товара</h1><br>
        <p>{{ $product }}</p>
    </div>
@endsection
