<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // метод для вывода всех заказов в шаблон
        $orders = Auth::user()->orders()->where('status', 1)->get();

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
