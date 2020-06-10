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
                                <a class="btn btn-warning" href="{{ route('categories.edit', $category) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger mr-3" value="Удалить" type="submit">
                            </form>
                        </div>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="btn-group" role="group">
            <a class="btn btn-success" href="{{ route('categories.create') }}">Добваить категорию</a>
        </div>
    </div>
@endsection
