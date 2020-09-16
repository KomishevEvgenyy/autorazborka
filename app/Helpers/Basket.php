<?php


namespace App\Helpers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

/*
 * Класс Basket который возвращает обработаный заказ в BasketController
 * при создании обьекта Basket из сесии принимается заказ который присваивается свойству $order
 * метод addProduct используя свойство $order в который пришел заказ создает новый заказ.
 * метод addRemove используя свойство $order в который пришел заказ удаляет новый заказ.
 * */

class Basket
{
    protected $order;


    /**
     * Basket constructor.
     * @param bool $createOrder
     */
    public function __construct($createOrder = false)
    {
        $orderId = session('orderId');
        // выбрать товар из сессии
        if (is_null($orderId) && $createOrder) {
            // Если значение сессии null то нужно создать заказ и положить в сессию
            $data = [];
            if (Auth::check()) {
                // фасад Auth с помощью метода check добавляет в поле user_id id методом id фасада Auth
                $data['user_id'] = Auth::id();
            }
            $this->order = Order::create(['user_id']);
            // методом create() создаем новое id для таблицы orders и присваиваем это значение переменной $order
            session(['orderId' => $this->order->id]);
            //  помещаем заказ в сесию в виде масива
        } else {
            $this->order = Order::findOrFail($orderId);
            // поиск товара
        }

    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    // метод для проверки количеста товара добавленого в корзину. Если количество товара добавленого в корзину привышает
    // количество товара в наличии, возвращает false
    /**
     * @param bool $updateCount
     * @return bool
     */
    public function countAvailable($updateCount = false)
    {
        foreach ($this->order->products as $orderProduct) {
            // если количество товара добавленое в корзину больше чем количество товара в наличии возвращаем false
            if ($orderProduct->count < $this->getPivotRow($orderProduct)->count) {
                return false;
            }
            if ($updateCount){
                // отнимаем количество товара
                $orderProduct->count -= $this->getPivotRow($orderProduct)->count;
            }
        }
        if ($updateCount){
            // обновления количества товара в БД
            $this->order->products->map->save();
        }
        return true;
    }

    /**
     * @param $name
     * @param $order
     * @return bool
     */
    public function saveOrder($name, $order)
    {
        if (!$this->countAvailable(true)) {
            return false;
        }
        return $this->order->saveOrder($name, $order);
    }

    /**
     * @param $product
     * @return mixed
     */
    protected function getPivotRow($product)
    {
        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
        // создаем SQL запрос где ищем первый продукт где через pivot добираемся до нужной нам строки
        // после чего данную запись заносим в переменную pivotRow
    }

    /**
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            // если в корзине имеется такой же продукт выполняем условие
            $pivotRow = $this->getPivotRow($product);
            if ($pivotRow->count < 2) {
                // Если значение в поле count меньше 2 то удаляем товар с корзины
                $this->order->products()->detach($product->id);
                // методом detach удалеям переданный нами товар с БД orders
            } else {
                // если значение в поле count больше 2 то уменьшаем это значение на 1 и обновляем таблицу
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        Order::changeFullSum(-$product->price);
        // изменяем суму заказа с помощью метода changeFullSum передав ему суму продукта и вычитанием отнимаем
        // от общей суму переданое значение
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function addProduct(Product $product)
    {

        //Добавление количества товара в корзине
        if ($this->order->products->contains($product->id)) {
            // проверка имеется ли уже в корзине такой же продукт
            $pivotRow = $this->getPivotRow($product);
            $pivotRow->count++;
            if ($pivotRow->count > $product->count) {
                return false;
            }
            // увеличиваем значение в поле count на 1
            $pivotRow->update();
            // обновляем таблицу
        } else {
            if ($product->count == 0) {
                return false;
            }
            $this->order->products()->attach($product->id);
            // добавление товара в заказ с мопощью связи где методом attach() передаем id товара
        }

        Order::changeFullSum($product->price);
        // изменяем суму заказа с помощью метода changeFullSum передав ему суму продукта и сложив два значения

        return true;
    }
}

