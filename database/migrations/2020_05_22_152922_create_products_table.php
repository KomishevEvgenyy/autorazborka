<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id'); // Марка автомобиля
            $table->string('model'); // модель автомобиля
            $table->string('part_name');  // название детали
            $table->text('description')->nullable();  // описание детали. Поле моет быть пустым
            $table->double('price')->default(0);  // цена детали. Значение по default равно 0
            $table->string('vendor_code');  // артикл детали
            $table->string('images')->nullable();  // фотография детали
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
        Schema::dropIfExists('products');
    }
}
