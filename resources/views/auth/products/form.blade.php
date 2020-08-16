@extends('auth.layouts.app')

@isset($product)
    @section('title-block', 'Редактировать товар '. $product->name)
@else
    @section('title-block', 'Добавить товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        @else
                <h1>Добавить товар</h1>
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
                        @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" id="code" name="code"
                               value=" {{ old('code', isset($product) ? $product->code:null) }} ">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label class="col-sm-2 col-form-label" for="name">Название:</label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name"
                               value=" {{ old('name', isset($product) ? $product->name:null) }} ">
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
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea id="description" name="description" cols="72" rows="7">
                            {{ old('description', isset($product) ? $product->description:null) }}
                        </textarea>
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
                        <label class="col-sm-2 col-form-label" for="price">Цена:</label>
                        <div class="col-sm-2">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" id="price" name="price"
                                   value=" {{ old('price', isset($product) ? $product->price:null) }} ">
                        </div>
                    </div>
                    <br/>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label" for="price">Кол-во:</label>
                        <div class="col-sm-2">
                            @error('count')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" id="count" name="count"
                                   value=" {{ old('count', isset($product) ? $product->count:null) }} ">
                        </div>
                    </div>
                <button class="btn btn-success mt-4">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
