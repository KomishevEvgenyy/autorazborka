@extends('auth.layouts.app')

@section('title-block', 'Управление заказами')

@section('content')
    <div class="col-md-12">
        @isset($orders)
        <h1>Заказы</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th> <th>
                    Имя
                </th> <th>
                    Телефон
                </th> <th>
                    Когда отправлен
                </th> <th>
                    Сумма
                </th> <th>
                    Действия
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $order->calculateFullSum() }} грн.</td>
                    <td>
                        <div class="btn-group" role="group">
                            @if(Auth::user()->isAdmin())
                                <a class="btn btn-success" href="{{ route('orders.show', $order) }}">Открыть</a>
                            @else
                                <a class="btn btn-success" href="{{ route('person.orders.show', $order) }}">Открыть</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
    @else
    <h3>Заказы отсутствуют</h3>
    @endisset
@endsection
