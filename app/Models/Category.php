<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['code', 'name', 'description', 'image'];
    // перечисляем поля которые можно будет заполнять при создании категории через админ панель
    public function products() {
        // метод который устанавливает связь с моделью Product многие ко многим так как у категории модет быть много товаров
        // возвращает все товары определенной категории
        return $this->hasMany(Product::class);
    }

}
