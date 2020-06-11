@extends('layouts/main')

@section('title-block', 'Корзина')

@section('content')
    @isset($order)
    <h1>Корзина</h1>
    <p>Оформление заказа</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Удалить</th>
                <th>Цена</th>
                <th>Общая сума</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>
                        <a href=" {{ route('product', [$product->category->code, $product->code]) }} ">
                            <img height="56px" src="{{ URL::asset('/storage/engine.jpg') }}">
                            {{ $product->description }}
                        </a>
                    </td>
                    <td><span class="badge">{{ $product->pivot->count }}</span>
                        <div class="btn-group form-inline text-center">
                            <form action="{{ route('basket-remove', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" href=""><span aria-hidden="true">x</span>
                                </button>
                            </form>

                        </div>
                    </td>
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
        <br>
        <div class="btn-group pull-right" role="group">
            <a class="btn btn-success" role="button"
               href="{{ route('basket-place') }}">Оформить заказ
            </a>
        </div>
        @else
            <h3>Корзина пустая</h3>
            @endisset
    </div>
@endsection
