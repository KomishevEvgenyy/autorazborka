@extends('auth.layouts.app')

@section('title-block', 'Управление категориями')

@section('content')
    <div class="col-md-12">
        @isset($categories)
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
                        Действие
                    </th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form method="POST" action="{{ route('categories.destroy', $category) }}">
                                <a class="btn btn-success mr-3" href="{{ route('categories.show', $category) }}">Открыть</a>
                                <a class="btn btn-warning mr-3" href="{{ route('categories.edit', $category) }}">Редактировать</a>
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
            <a class="btn btn-success" href="{{ route('categories.create') }}">Добавить категорию</a>
        </div>
        @else
            <h3>Категории отсутствуют</h3>
            <div class="btn-group" role="group">
                <a class="btn btn-success" href="{{ route('categories.create') }}">Добавить</a>
            </div>
        @endisset
    </div>
@endsection
