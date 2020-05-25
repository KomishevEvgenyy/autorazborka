<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // таблица для заказаных товаров
            $table->bigIncrements ('id');
            $table->tinyInteger('status')->default(0); // статус товара указывает
            // это оформленный заках или корзина. По умолчанию значение 0 не оформленный заказ
            $table->string('name')->nullable();
            // имя заказчика
            $table->string('phone')->nullable();
            // номер телефона заказчика
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
