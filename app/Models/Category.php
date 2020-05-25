<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() {
        // метод который устанавливает связь с моделью Product многие ко многим так как у категории модет быть много товаров
        return $this->hasMany(Product::class);
    }
}
