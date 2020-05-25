<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Product::get();
        // метод который выводит главную страницу
        return view('home', compact('products'));
    }

    public function contacts(){
        // метод который выводит страницу с контактами
        return view('contacts');
    }

    public function about(){
        // метод который выводит страницу О нас
        return view('about');
    }

    public function categories(){
        // метод который выводит страницу с категориями товаров
        $categories = Category::get();
        //  получаем колекцию категорий и с помощью метода compact передаем его в шаблон categories
        return view('categories', compact('categories'));
    }

    public function category($code){
        // Возвращает страницу с товарами выбраной категории
        $category = Category::where('code', $code)->first();
        // Через модель Category методом where первым параментром указываем по какому полю проводим поиск,
        // а вторым параметром указываем что ищем. Далее методом first забираем с масива нужный нам бренд
        return view('category', compact('category'));
        //  Методом compact передаем имя бренда с поля code

    }

    public function product($category, $product = null){
        // метод который будет динамически формировать страницы с товарами. Метод принимает один параметр который
        // приходит с url после имени категории "/vaz/engine".

        return view('product', ['product' => $product]);
        // возвращает шаблон product.blade.php, а так же передает массив с БД
    }

    public function car_sale(){
        // метод который выводит страницу с Б/у автомобилями
        $car_sale = "Страница для продажи Б/у автомобилей";
        return view('car_sale', compact('car_sale'));
    }

    public function basket(){
        // Методк который будет заполнять корзину с товарами
        $basket = "Страница для корзины с товарами";
        return view('basket', compact('basket'));
    }

    public function basketPlace(){
        //  метод который позволяет оформить заказ товаров которые находятся в корзине
        $basketPlace = "Страница с формой для отправки заказов";
        return view('order', compact('basketPlace'));
    }
}
