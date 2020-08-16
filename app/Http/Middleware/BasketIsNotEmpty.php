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
        // метод который проверяет не пустая ли корзина у пользователя.
        // Если корзина пустая выполняет redirect на главную страницу с ошибкой в session
        $orderId = session('orderId');
        if (!is_null($orderId) && Order::getFullSum() > 0) {
            // Если заказ в сессии больше 0 то выполнить условие
            return $next($request);

        }
        session()->flash('warning', 'Ваша корзина пустая');
        return redirect()->route('index');
    }
}
