<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => false, 'reset' => false, 'confirm' => false]);
// подключение к моделям Auth. Отклбчено verify, reset, confirm

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'MainController@index')->name('index');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function (){
    Route::get('/orders', 'OrderController@index')->name('home');
});
// middleware - прослойка между маршрутом и контроллером. Перед тем как зайти на страницу home сначало будет
// выполенено условия middleware. auth означает если пользователь зарегистрирован то его отправит по указаном маршруту

Route::get('/contacts', 'MainController@contacts')->name('contacts');

Route::get('/about', 'MainController@about')->name('about');

Route::get('/car_sale', 'MainController@car_sale')->name('car_sale');

Route::get('/basket', 'BasketController@basket')->name('basket');
Route::get('/basket/place', 'BasketController@basketPlace')->name('basket-place');
Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');
// маршрут который будет добавлять товары в корзину
Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
// маршрут для удаления товара из корзины
Route::post('/basket/place', 'BasketController@basketConfirm')->name('basket-confirm');
// маршрут для подтверждения заказа

Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product?}','MainController@product')->name('product');
// знак ? после имени продукта указывает на то, что это параметр не обязательный







