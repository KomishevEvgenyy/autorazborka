@extends('layouts/main')

@section('title-block', 'Категории')

@section('content')
    <h1>
        Страница с категориями
    </h1>
        <ul class="">
            @foreach($categories as $category)
                <li> <a href="/{{$category->code}}">{{ $category->brand }}</a></li>
            @endforeach
        </ul>


@endsection
