@extends('auth.layouts.app')

@section('title-block', 'Заказ'. $order->id)

@section('content')
    <div class="panel">
        <div class="justify-content-center">
            <h1>Заказ №{{ $order->id }}</h1>
            <p>Заказчик <b>{{ $order->name }}</b></p>
            <p>Мобильный телефон <b><a href="{{ $order->phone }}" class="phone_clients">{{ $order->phone }}</a></b></p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>количество</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="@">
                                <img height="56px" src="{{ Storage::url( $product->image)}}">
                                {{ $product->name }}
                            </a>
                        </td>

                        <td><span class="badge">{{ $product->pivot->count }}</span></td>

                        <td>{{ $product->price }} грн.</td>

                        <td>{{ $product->getPriceForCount() }} грн.</td>

                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{ $order->getFullPrice() }} грн.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
