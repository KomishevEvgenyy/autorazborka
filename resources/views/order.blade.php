@extends('layouts/main')

@section('title-block', 'Оформить заказ')

@section('content')
    <div class="text-center">
        <h1>Подтвердите заказ</h1>
        <p>Общая стоимость заказа: <b>{{$order->getFullPrice()}} грн.</b></p>
        <p class="">Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('basket-confirm') }}" method="POST">
                @csrf
                <div>
                    <div class="container">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Имя:</span>
                            </div>
                            <input type="text" name="name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Номер телефона:</span>
                            </div>
                            <input type="text" name="phone" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <!--
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона: </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>-->
                    </div>
                    <input type="submit" class="btn btn-success ml-3" value="Подтвердите заказ">
                </div>
            </form>
        </div>
    </div>
@endsection
