@extends('layouts/main')

@section('title-block', 'Категории')

@section('content')
    <h1>
        Страница с категориями
    </h1>
        <ul class="">
            @foreach($categories as $category)
                <li> <a href="{{ route('category', $category->code) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>


@endsection
