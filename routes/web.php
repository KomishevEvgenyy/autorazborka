<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'MainController@index')->name('home');

Route::get('/contacts', 'MainController@contacts')->name('contacts');

Route::get('/about', 'MainController@about')->name('about');

Route::get('/car_sale', 'MainController@car_sale')->name('car_sale');

Route::get('/basket', 'BasketController@basket')->name('basket');

Route::get('/basket/place', 'BasketController@basketPlace')->name('basket-place');

Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');
// маршрут который будет добавлять товары в корзину

Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
// маршрут для удаления товара из корзины

Route::get('/categories', 'MainController@categories')->name('categories');

Route::get('/{category}', 'MainController@category')->name('category');

Route::get('/{category}/{product?}','MainController@product')->name('product');
// знак ? после имени продукта указывает на то, что это параметр не обязательный


