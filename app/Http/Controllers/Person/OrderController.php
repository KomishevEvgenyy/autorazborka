<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
 * Класс для вывода в представление заказов пользователя
 * */
class OrderController extends Controller
{
    public function index()
    {
        // метод для вывода всех заказов в шаблон
        // active обьект для фильрации активных заказов
        $orders = Auth::user()->orders()->active()->paginate(10);

        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order){
        // метод для вывода заказа клиента в шаблон
        if(!Auth::user()->orders->contains($order)){
            return back();
        }
        return view('auth.orders.show', compact('order'));
    }
}
