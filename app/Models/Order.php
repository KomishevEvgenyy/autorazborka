<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        /*
            устанавливаем связь между маледелью Order с моделью Product,
            так же по умолчанию данная связть подхватит таблицу order_product,
            где через поля order_id и product_id составит соотношения
            withPivot дает доступ к полю count таблицы order_product
            Метод withTimestamps() будет обновлять поля timestamp в таблице order_product
        */
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice(){
        // метод который считает общую суму товара
        $sum = 0;
        foreach($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrder($name, $phone){
        // метод который сохраняет заказ
        if ($this->status == 0){
            $this->name = $name;
            // записываем в поле name таблицы orders значение которое пришло по request->name
            $this->phone = $phone;
            // записываем в поле phone таблицы orders значение которое пришло по request->phone
            $this->status = 1;
            // меняем значение статус в поле status таболицы order на 1
            $this->save();
            // сохранение изменений в таблице

            session()->forget('orderId');
            // удаление заказа из сессии
            return true;
        }
        return false;
    }
/*
    public function user(){
        // метод который делает связь с классом пользователей
        return $this->belongsTo(User::class);
    }
*/
}
