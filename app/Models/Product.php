<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    // разширение класса Product уже реализованым ранее классом

    protected $fillable = ['code', 'name', 'description', 'price', 'image', 'category_id', 'count'];
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

    public function scopeByCodeProduct($query, $code){
        // scope для метода product MainController
        return $query->where('code', $code);
    }

    public function isAvailable(){
        // метод который проверяет наличие товара
        return !$this->trashed() && $this->count > 0;
        // товар должен быть не удалён и не меньше нуля.
    }
}
