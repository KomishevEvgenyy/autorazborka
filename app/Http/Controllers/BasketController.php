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
            //  Если значение в заказе не null то методом findOrFail
            // находим заказ и записываем его в переменную $order
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
            // Если значение сессии null то нужно создать заказ и положить в сессию
            $order = Order::create()->id;
            // методом create() создаем новое id для таблицы orders и присваиваем это значение переменной $order
            session(['orderId' => $order]);
            //  помещаем заказ в сесию в виде масива
        }else {
            $order = Order::find($orderId);
            // если заказ есть ложим его в корзину
        }

         //Добавление количества товара в корзине
        if ($order->products->contains($productId)){
            // промеряем имеется ли уже в корзине такой же продукт
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            // создаем SQL запрос где ищем первый продукт где через pivot добираемся до нужной нам строки
            // после чего данную запись заносим в переменную pivotRow
            $pivotRow->count++;
            // увеличиваем значение в поле count на 1
            $pivotRow->update();
            // обновляем таблицу
        }else{
            $order->products()->attach($productId);
            // добавление товара в заказ с мопощью связи где методом attach() передаем id товара
        }

       // $order->products()->attach($productId);
        // добавление товара в заказ с мопощью связи где методом attach() передаем id товара

        return redirect()->route('basket');
    }

    public function basketRemove($productId){
        // метод для удаления товара с корзины. Принимает один параметр это id товара ко торый нужно удалить
        $orderId = session('orderId');
        if (is_null($orderId)) {
            // если ничего не передано то выполняется redirect на страницу корзины
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        // находим товар который нужно удалить

        if ($order->products->contains($productId)){
            // промеряем имеется ли уже в корзине такой же продукт
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            // создаем SQL запрос где ищем первый продукт где через pivot добираемся до нужной нам строки
            // после чего данную запись заносим в переменную pivotRow
            if ($pivotRow->count < 2){
                // Если згначение в поле count меньше 2 то удаляем товар с корзины
                $order->products()->detach($productId);
                // методом detach удалеям переданный нами товар с БД orders
            }else{
                // если значение в поле count больше 2 то уменьшаем это значение на 1 и обновляем таблицу
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        return redirect()->route('basket');
    }
}
