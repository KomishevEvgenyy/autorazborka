@extends('layouts/main')

@section('title-block', 'Корзина')

@section('content')

    <div class="starter-template">
        <p class="alert alert-success">Добавлен товар iPhone X 256GB</p>
        <h1>Корзина</h1>
        <p>Оформление заказа</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Удалить</th>
                    <th>Цена</th>

                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>
                        <a href=" {{ route('product,', $product->category->code, $product->code) }} ">
                            <img height="56px" src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg">
                            {{ $product->description }}
                        </a>
                    </td>
                    <td>
                        <div class="btn-group form-inline text-center">
                            <form action="http://internet-shop.tmweb.ru/basket/remove/2" method="POST">
                                <button type="submit" class="btn btn-danger" href=""><span class="glyphicon glyphicon-minus" aria-hidden="true">x</span></button>
                                <input type="hidden" name="_token" value="nboNrCcGlhX72imNVVIHfGC97xVAWFPx0KtdWuAo">
                            </form>

                        </div>
                    </td>
                    <td>{{ $product->price }} грн.</td>

                </tr>
                @endforeach
                <tr>
                    <td colspan="2">Общая стоимость:</td>
                    <td>89990 ₽</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="http://internet-shop.tmweb.ru/basket/place">Оформить заказ</a>
            </div>
        </div>
    </div>

@endsection
