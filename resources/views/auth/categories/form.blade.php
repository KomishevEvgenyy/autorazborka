@extends('auth.layouts.app')

@isset($category)
    @section('title-block', 'Редактировать категорию '. $category->name)
@else
    @section('title-block', 'Доьавить атегорию')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($category)
            <h1>Редактировать категорию <b>{{ $category->name }}</b></h1>
        @else
                <h1>Добавить категорию</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
            @isset($category)
                action="{{ route('categories.update', $category) }}"
            @else
                action="{{ route('categories.store') }}"
            @endisset
            >
            <div>
                @isset($category)
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
                               value=" {{ old('code', isset($category) ? $category->code :null) }} ">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label class="col-sm-2 col-form-label" for="name">Введите марку:</label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name"
                               value=" {{ old('name', isset($category) ? $category->name:null) }} ">
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
                            {{ old('description', isset($category) ? $category->description:null) }}
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
