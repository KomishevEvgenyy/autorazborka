<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // поле для марки и подели авто
            $table->text('description')->nullable(); // поле для описания авто
            $table->double('price')->default(0); // поле для цены авто
            $table->text('image1')->nullable(); // поле для фото авто
            $table->text('image2')->nullable();
            $table->text('image3')->nullable();
            $table->text('image4')->nullable();
            $table->text('image5')->nullable();
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
        Schema::dropIfExists('car_sales');
    }
}
