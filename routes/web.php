<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'MainController@index')->name('home');

Route::get('/contacts', 'MainController@contacts')->name('contacts');

Route::get('/about', 'MainController@about')->name('about');

Route::get('/categories', 'MainController@categories')->name('categories');

Route::get('/{category}', 'MainController@category')->name('category');

Route::get('/category/{product?}','MainController@product')->name('product');
// знак ? после имени продлукта указывает на то что это параметр не обязательный

Route::get('/car_sale', 'MainController@car_sale')->name('car_sale');


