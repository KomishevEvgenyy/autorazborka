<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket(){
        // метод для просмотра товаров в корзине
        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('basket', compact('order'));
    }

    public function basketPlace(){
        //  метод который позволяет оформить заказ товаров которые находятся в корзине
        $basketPlace = "Страница с формой для отправки заказов";
        return view('order', compact('basketPlace'));
    }

    public function basketAdd($productId){
        // метод для добавления товаров в корзину
        $orderId = session('orderId');
        // С помощью сессии будут добавляться товара. И чтобы достать данные из сессии нужно использовать аргументом ключ
        if (is_null($orderId)) {
            // Если значение сессии null то нужно создать её и полоджить в сессию
            $order = Order::create()->id;
            session(['orderId' => $order->id]);
        }else {
            $order = Order::find($orderId);
        }
        $order->products()->attach($productId);
        // добавление товара в заказ
        return view('basket', compact('order'));
    }
}
