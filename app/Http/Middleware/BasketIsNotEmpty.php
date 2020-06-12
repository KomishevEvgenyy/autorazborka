<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            // findOrFail выдаст ошибку 404 если по id order не будет ничего найдено
            if ($order->products->count() > 0) {
                // если колчичество товаров в корзине больше 0 то выполнить условие
                return $next($request);
            }
        }
        session()->flash('warning', 'Ваша корзина пустая');
        return redirect()->route('index');
    }
}
