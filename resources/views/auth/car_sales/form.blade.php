@extends('auth.layouts.app')

@isset($carSale)
    @section('title-block', 'Редактировать автомобиль '. $carSale->name)
@else
    @section('title-block', 'Добавить автомобиль')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($carSale)
            <h1>Редактировать автомобиль <b>{{ $carSale->name }}</b></h1>
        @else
            <h1>Добавить автомобиль</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
            @isset($carSale)
                action="{{ route('car_sales.update', $carSale) }}"
            @else
                action="{{ route('car_sales.store') }}"
            @endisset
        >
            <div>
                @isset($carSale)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label class="col-sm-2 col-form-label" for="code">Цена:</label>
                    <div class="col-sm-6">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" id="price" name="price"
                               value=" {{ old('code', isset($carSale) ? $carSale->price :null) }} ">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label class="col-sm-2 col-form-label" for="name">Введите марку и модель автомобиля:</label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name"
                               value=" {{ old('name', isset($carSale) ? $carSale->name:null) }} ">
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
                            {{ old('description', isset($carSale) ? $carSale->description:null) }}
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
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>

    </div>
@endsection
