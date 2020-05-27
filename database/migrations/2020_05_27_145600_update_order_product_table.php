<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderProductTable extends Migration
{
    /*
     Миграция которая будет добавлять поле count в таблицу order_product
     Метод up создает поле с именем count в таблице order_product после поля product_id.
     По умолчению данное поле имеет значение 1. В данном будет хранится количество товаров
     Метод down удаляет колонку count
     * */
    public function up()
    {
        Schema::table('order_product', function (Blueprint $table) {
            // таблица для увеличения количества товара
            $table->integer('count')->default(1)->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            // таблица для удаления колонки count
            $table->dropColumn('count');
        });
    }
}
