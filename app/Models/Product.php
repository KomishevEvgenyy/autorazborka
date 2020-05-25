<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        //  метод который устанавливает связи с молделью Category со связью один к одному так как у товара одна категория
        // возвращает одну категорию
        return $this->belongsTo(Category::class);
    }
}
