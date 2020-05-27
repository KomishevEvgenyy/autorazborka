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
        $sum = 0;
        foreach($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }
}
