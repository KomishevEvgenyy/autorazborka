<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code', 'name', 'description', 'price', 'image', 'category_id'];
    // перечисляем поля которые можно будет заполнять при создании товаров через админ панель
    public function category(){
        //  метод который устанавливает связи с молделью Category со связью один к одному так как у товара одна категория
        // возвращает одну категорию
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(){
        // метод которий подсчитывает общую суму для определенного товара
        if (!is_null($this->pivot)){
            // Если значение не null то колчество товара умножаем на его цену
            return $this->pivot->count * $this->price;
        }
        return $this->price;
        // если де значение null то выводим его цену за единицу товара
    }
}
