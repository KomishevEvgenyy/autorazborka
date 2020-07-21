<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basketAdd($productId){
        // метод для добавления товаров в корзину
        $orderId = session('orderId');
        // С помощью сессии будут добавляться товара. И чтобы достать данные из сессии нужно использовать аргументом ключ

        if (is_null($orderId)) {
            // Если значение сессии null то нужно создать заказ и положить в сессию
            $order = Order::create();
            // методом create() создаем новое id для таблицы orders и присваиваем это значение переменной $order
            session(['orderId' => $order->id]);
            //  помещаем заказ в сесию в виде масива
        }else {
            $order = Order::find($orderId);
            // если заказ есть ложим его в корзину
        }

        //Добавление количества товара в корзине
        if ($order->products->contains($productId)){
            // проверка имеется ли уже в корзине такой же продукт
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

        if (Auth::check()){
            // фасад Auth с помощью метода check добавляет в поле user_id id методом id фасада Auth
            $order->user_id = Auth::id();
            $order->save();
            // Сохранение данных в поле
        }

        $product = Product::find($productId);
        // находим товар который был положен в корзину и записываем его в переменную product
        Order::changeFullSum($product->price);
        // изменяем суму заказа с помощью метода changeFullSum передав ему суму продукта и сложив два значения
        session()->flash('success', 'Добавлен товар '.$product->name);
        // методом flash через сессиию выводим сообщение о добавлнении товара в корзину в шаблоне main

        return redirect()->route('basket');
    }

    public function basketRemove($productId){
        // метод для удаления товара с корзины. Принимает один параметр это id товара который нужно удалить
        $orderId = session('orderId');
        if (is_null($orderId)) {
            // если ничего не передано то выполняется redirect на страницу корзины
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        // находим товар который нужно удалить

        if ($order->products->contains($productId)){
            // если в корзине имеется такой же продукт выполняем условие
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            // создаем SQL запрос где ищем первый продукт где через pivot добираемся до нужной нам строки
            // после чего данную запись заносим в переменную pivotRow
            if ($pivotRow->count < 2){
                // Если значение в поле count меньше 2 то удаляем товар с корзины
                $order->products()->detach($productId);
                // методом detach удалеям переданный нами товар с БД orders
            }else{
                // если значение в поле count больше 2 то уменьшаем это значение на 1 и обновляем таблицу
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product = Product::find($productId);
        // находим товар который был положен в корзину и записываем его в переменную product
        Order::changeFullSum(-$product->price);
        // изменяем суму заказа с помощью метода changeFullSum передав ему суму продукта и вычитанием отнимаем
        // от общей суму переданое значение
        session()->flash('error', 'Удален товар '.$product->name);
        // методом flash через сессиию выводим сообщение о удалении товара из корзину в шаблоне main

        return redirect()->route('basket');
    }

    public function basket(){
        // метод для просмотра товаров в корзине
        $orderId = session('orderId');
        if(!is_null($orderId)){
            //  Если значение в заказе не null то методом findOrFail
            // находим заказ и записываем его в переменную $order
            $order = Order::findOrFail($orderId);
            return view('basket', compact('order'));
        }
        return view('basket');
    }

    public function basketPlace(){
        //  метод позволяет оформить заказ товаров которые находятся в корзине
        $orderId = session('orderId');
        // С помощью сессии будут добавляться товара. И чтобы достать данные из сессии нужно использовать аргументом ключ
        if (is_null($orderId)) {
            //  Если заказ пустой то выполняется redirect на главную страницу
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        // находим заказ и записываем его в переменную order
        return view('order', compact('order'));
    }

    public function basketConfirm(Request $request){
        // метод который подтверждает заказ
        $orderId = session('orderId');
        // С помощью сессии будут добавляться товара. И чтобы достать данные из сессии нужно использовать аргументом ключ
        if (is_null($orderId)) {
            //  Если заказ пустой то выполняется redirect на главную страницу
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        // находим заказ и записываем его в переменную order
        $success = $order->saveOrder($request->name, $request->phone);
        // в метод saveOrder, модели Order передаем первым параметром поля имя, а вторым параметром поле телефон
        // с помощью метода request для создания заказа с данными заказчика

        if ($success){
            // Если переменная success вернула true(заказ принят в обработку) то в основном шаблоне выводим сообшщение с помощью флеш сессии
            // через метод get*(
            session()->flash('success','Товар отправлен в обработку');
        }else{
            // Если переменная success вернула false(случилась ошибка а ходе передачи заказа) то в основном шаблоне выводим сообшщение с помощью флеш сессии
            // через метод get*(
            session()->flash('error','Ошибка');
        }
        Order::eraseOrderSum();
        // метод для чистки поля full_order_sum в сессии в которой хранится сума заказа
        return redirect()->route('index');
    }
}
