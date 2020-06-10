@extends('auth.layouts.app')

@isset($product)
    @section('title-block', 'Редактировать категорию '. $product->name)
@else
    @section('title-block', 'Доьавить атегорию')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать категорию <b>{{ $product->name }}</b></h1>
        @else
                <h1>Добавить категорию</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
            @isset($product)
                action="{{ route('products.update', $product) }}"
            @else
                action="{{ route('products.store') }}"
            @endisset
            >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label class="col-sm-2 col-form-label" for="code">Код:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="code" name="code" value="@isset($product) {{$product->code}} @endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label class="col-sm-2 col-form-label" for="name">Название:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="name" value="@isset($product) {{$product->name}} @endisset">
                    </div>
                </div>
                <br>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label" for="name">Категория:</label>
                        <div class="col-sm-6">
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id}}">
                                        @isset($product)
                                            @if($product->category_id == $category->id)
                                                @endif
                                            @endisset
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                <div class="input-group row">
                    <label class="col-sm-2 col-form-label" for="description">Описание:</label>
                    <div class="col-sm-6">
                        <textarea id="description" name="description" cols="72" rows="7">@isset($product) {{ $product->description }} @endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label class="col-sm-2 col-form-label" for="image">Фото:</label>
                    <div class="col-sm-10">
                        <label class="btn btn-success btn-file">
                            Загрузить <input type="file" style="display: none" id="image" name="image" value="">
                        </label>
                    </div>
                </div>
                    <br>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label" for="name">Цена:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value="@isset($product) {{$product->price}} @endisset">
                        </div>
                    </div>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
