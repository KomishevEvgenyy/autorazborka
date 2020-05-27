@extends('layouts/main')

@section('title-block', 'Категории')

@section('content')
    <h1>
        Страница с категориями
    </h1>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-3">
                <a href="{{ route('category', $category->code) }}">
                    <img width="100" src="{{ URL::asset('/storage/'.$category->code).'.jpg' }}">
                </a>
                </div>
            @endforeach
        </div>


@endsection
