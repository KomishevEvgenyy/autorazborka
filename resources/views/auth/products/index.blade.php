@extends('auth.layouts.app')

@section('title-block', 'Управление категориями')

@section('content')
    <div class="col-sm-12">
        @isset($products)
        <h1>Заказы</h1>
        <table class="table text-center">
            <thead>
                <tr class="row">
                    <th class="col-1">#</th>
                    <th class="col-2">Код</th>
                    <th class="col">Имя категории</th>
                    <th class="col-3">Описание</th>
                    <th class="col-1">Кол-во</th>
                    <th class="col-4">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="row">
                    <td class="col-1">{{ $product->id }}</td>
                    <td class="col-2">{{ $product->code }}</td>
                    @foreach($categories as $category)
                            @isset($product)
                                @if($product->category_id == $category->id)
                                <td class="col" >{{ $category->name }}</td>
                                @endif
                            @endisset
                    @endforeach
                    <td class="col-3">{{ $product->description }}</td>
                    <td class="col-1">{{ $product->count }}</td>
                    <td class="col-4">
                        <div class="btn-group" role="group">
                            <form method="POST" action="{{ route('products.destroy', $product) }}">
                                <a class="btn btn-success" href="{{ route('products.show', $product) }}">Открыть</a>
                                <a class="btn btn-warning" href="{{ route('products.edit', $product) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" value="Удалить" type="submit">
                            </form>
                        </div>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
        <div class="btn-group" role="group">
            <a class="btn btn-success" href="{{ route('products.create') }}">Добавить товар</a>
        </div>
        @else
        <h3>Товары отсутствуют</h3>
            <div class="btn-group" role="group">
                <a class="btn btn-success" href="{{ route('products.create') }}">Добавить</a>
            </div>
        @endisset
    </div>
@endsection
