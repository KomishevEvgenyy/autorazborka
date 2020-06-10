@extends('auth.layouts.app')

@section('title-block', 'Управление категориями')

@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>
        <table class="table text-center">
            <tbody>
                <tr>
                    <th>
                        #
                    </th> <th>
                        Код
                    </th> <th>
                        Имя категории
                    </th> <th>
                        Описание
                    </th> <th>
                        Действие
                    </th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->code }}</td>

                    @foreach($categories as $category)
                            @isset($product)
                                @if($product->category_id == $category->id)
                                <td>{{ $category->name }}</td>
                                @endif
                            @endisset
                    @endforeach
                    <td>{{ $product->description }}</td>

                    <td>
                        <div class="btn-group" role="group">
                            <form method="POST" action="{{ route('products.destroy', $product) }}">
                                <a class="btn btn-success mr-3" href="{{ route('products.show', $product) }}">Открыть</a>
                                <a class="btn btn-warning mr-3" href="{{ route('products.edit', $product) }}">Редактировать</a>
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
        <div class="btn-group" role="group">
            <a class="btn btn-success" href="{{ route('products.create') }}">Добавить товар</a>
        </div>
    </div>
@endsection
