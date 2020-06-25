@extends('auth.layouts.app')

@section('title-block', 'Управление категориями')

@section('content')
    <div class="col-md-12">
        @isset($carSale)
        <h1>Заказы</h1>
        <table class="table text-center">
            <tbody>
            <tr>
                <th>
                    #
                </th> <th>
                    Марка модель
                </th> <th>
                    Цена
                </th> <th>
                    Действие
                </th>
            </tr>
            @foreach($carSale as $car_sale)
                <tr>
                    <td>{{ $car_sale->id }}</td>
                    <td>{{ $car_sale->name }}</td>
                    <td>{{ $car_sale->price }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form method="POST" action="{{ route('car_sale.destroy', $car_sale) }}">
                                <a class="btn btn-success mr-3" href="{{ route('car_sale.show', $car_sale) }}">Открыть</a>
                                <a class="btn btn-warning mr-3" href="{{ route('car_sale.edit', $car_sale) }}">Редактировать</a>
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
            <a class="btn btn-success" href="{{ route('car_sale.create') }}">Добавить автомобиль</a>
        </div>
        @else
            <p>Б/у автомобилей в продаже нет</p>
            <div class="btn-group" role="group">
                <a class="btn btn-success" href="{{ route('car_sale.create') }}">Добавить автомобиль</a>
            </div>
        @endisset
    </div>
@endsection
