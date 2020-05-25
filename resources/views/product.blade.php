@extends('layouts/main')

@section('title-block', $product)

@section('content')
        <h1>Страница для отображения определенного товара</h1><br>
    <p>
        {{ $product }}
    </p>

@endsection
