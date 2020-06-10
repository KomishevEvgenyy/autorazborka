<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => false, 'reset' => false, 'confirm' => false]);
// подключение к моделям Auth. Отклбчено verify, reset, confirm

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'MainController@index')->name('index');

Route::group(
        ['middleware' => 'auth',
        'namespace' => 'Admin',
        'prefix' => 'admin'],
    function (){
    Route::group(
        ['middleware' =>'is_admin'],
        function (){
        Route::get('/orders', 'OrderController@index')->name('home');
    });
    Route::resource('categories', 'CategoryController');
});
// middleware - прослойка между маршрутом и контроллером. Перед тем как зайти на страницу home сначало будет
// выполенено условия middleware. auth означает если пользователь зарегистрирован то его отправит по указаном маршруту

Route::get('/contacts', 'MainController@contacts')->name('contacts');

Route::get('/about', 'MainController@about')->name('about');

Route::get('/car_sale', 'MainController@car_sale')->name('car_sale');

Route::group(['prefix'=>'basket'], function (){
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');
    // маршрут который будет добавлять товары в корзину
    Route::group(['middleware' =>'basket_not_empty'], function(){
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
        Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
        // маршрут для удаления товара из корзины
        Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
        // маршрут для подтверждения заказа
    });
});



Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product?}','MainController@product')->name('product');
// знак ? после имени продукта указывает на то, что это параметр не обязательный







