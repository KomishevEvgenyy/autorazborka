@extends('layouts/main')

@section('title-block', 'Категории')

@section('content')
    <div class="mb-5">
        <h1 class="text-center">
            Категории товаров
        </h1>
    </div>

        <div class="row">
            @foreach($categories as $category)
                <div class="col-3">
                <a href="{{ route('category', $category->code) }}">
                    <img width="150" src="{{ URL::asset('/storage/'.$category->code).'.jpg' }}">
                </a>
                </div>
            @endforeach
        </div>
@endsection
