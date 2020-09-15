<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];

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

    public function scopeActive($query) {
        // метод для фильтрации активных заказов для OrderController администратора и пользователя
        return $query->where('status', 1);
    }

    public function calculateFullSum(){
        // метод который считает общую суму товара
        $sum = 0;
        foreach($this->products()->withTrashed()->get() as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public static function eraseOrderSum(){
        // метод для чистки поля full_order_sum в сессии поcле отправки заказа
        session()->forget('full_order_sum');
    }

    public static function changeFullSum($changeSum){
        // метод который будет изменять суму при добалении нового  товара в корзину
        $sum = self::getFullSum() + $changeSum;
        // в переменную $sum присваиваем значение со слодения сумы в методе getFullSum и сумву нвого товара $changeSum
        session(['full_order_sum' => $sum]);
        // ложим в поле сессии full_order_sum новое значение от слодения двух значений $sum
    }

    public static function getFullSum(){
        // метод который возвращает общую суму товаров из сессии
        return session('full_order_sum', 0);
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

}
