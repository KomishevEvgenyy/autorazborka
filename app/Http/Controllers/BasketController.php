<?php

namespace App\Http\Controllers;

use App\Helpers\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basket()
    {
        // метод для просмотра товаров в корзине
        $order = (new Basket())->getOrder();

        return view('basket', compact('order'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basketAdd(Product $product)
    {
        // метод для добавления товаров в корзину
        $result = (new Basket(true))->addProduct($product);
        // создание обьекта Basket, передаем ему флаг true и вызываем метод addProduct которому передаем обьект Product
        if ($result) {
            session()->flash('success', 'Добавлен товар ' . $product->name);
            // методом flash через сессиию выводим сообщение о добавлнении товара в корзину в шаблоне main
        } else session()->flash('error', 'Товар ' . $product->name . ' в данном количестве не доступен для заказа ');

        return redirect()->route('basket');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basketRemove(Product $product)
    {
        // метод для удаления товара с корзины. Принимает один параметр это id товара который нужно удалить
        (new Basket())->removeProduct($product);
        // создание обьекта Basket в метод которого передаем екземпляр класса Product который нужно удалить.
        session()->flash('error', 'Удален товар ' . $product->name);
        // методом flash через сессиию выводим сообщение о удалении товара из корзину в шаблоне main

        return redirect()->route('basket');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketPlace()
    {
        //  метод позволяет оформить заказ товаров которые находятся в корзине
        $basket = new Basket();
        $order = $basket->getOrder();
        if (!$basket->countAvailable()) {
            session()->flash('error', 'Товар не доступен для заказа в данном количестве.');
        }

        return view('order', compact('order'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basketConfirm(Request $request)
    {
        // метод который подтверждает заказ
        //$email = Auth::check() ? Auth::user()->email : $request->email;
        if ((new Basket())->saveOrder($request->name, $request->phone)) {
            // в метод saveOrder, модели Basket передаем первым параметром поле имя, а вторым параметром поле телефон
            // если поля заполненны то в основном шаблоне выводим сообщение с помощью флеш сессии
            // через метод get*(
            session()->flash('success', 'Товар отправлен в обработку');
        } else {
            // Если поля не были заполненны то в основном шаблоне выводим сообшщение с помощью флеш сессии
            // через метод get*(
            session()->flash('error', 'Товар не доступен для заказа в данном количестве.');
        }
        Order::eraseOrderSum();
        // метод для чистки поля full_order_sum в сессии в которой хранится сума заказа
        return redirect()->route('index');
    }
}
