<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       /* метод для вывода всех заказов в шаблон для admin
        active обьект для фильрации активных заказов, paginate выводит указаное количество заказов на странице,
        где в шаблоне index методом links бедут выводится количество страниц*/
        $orders = Order::active()->paginate(10);
        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order){
        // метод для вывода заказа клиенту в шаблон show
        return view('auth.orders.show', compact('order'));
    }
}
