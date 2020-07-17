<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => false, 'reset' => false, 'confirm' => false]);
// подключение к моделям Auth. Отклбчено verify, reset, confirm

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'MainController@index')->name('index');

Route::middleware(['auth'])->group(function(){
    // маршрут для зарегистрированых пользователей
    Route::group(
        // маршрут для пользователей
        ['namespace' => 'Person',
            'prefix' => 'person',
            'as' => 'person.'], function(){
        Route::get('/orders', 'OrderController@index')->name('orders.index');
        Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
    });

    Route::group(
        ['namespace' => 'Admin',
            'prefix' => 'admin'],
        // маршрут для администратора
        function (){
            Route::group(
                ['middleware' =>'is_admin'],
                // middleware - прослойка между маршрутом и контроллером. Перед тем как зайти на страницу home сначало будет
// выполенено условия middleware.
                function (){
                    Route::get('/orders', 'OrderController@index')->name('home');
                    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
                });
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::resource('car_sales', 'CarSaleController');
        });
});


Route::get('/contacts', 'MainController@contacts')->name('contacts');

Route::get('/about', 'MainController@about')->name('about');

Route::get('/car_sale', 'MainController@car_sale')->name('car_sale');

Route::group(['prefix'=>'basket'], function (){
    // маршрут для корзины
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');
    // маршрут который будет добавлять товары в корзину
    Route::group(['middleware' =>'basket_not_empty'], function(){
        // маршрут для проверки наличия заказа в корзине
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







