<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        // устанавливаем связь между маледелью Order с моделью Product,
        // так же по умолчанию данная связть подхватит таблицу order_product,
        // где через поля order_id и product_id составит соотношения
        return $this->belongsToMany(Product::class);
    }
}
