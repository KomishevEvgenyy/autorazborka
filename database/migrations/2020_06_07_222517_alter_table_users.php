<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * ДОбавление в таблицу Users поле admin
     */
    public function up()
    {
        // метод для добавления поля админ
        Schema::table('users', function (Blueprint $table){
           $table->tinyInteger('is_admin')->default(0)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // метод для удаления поля админ
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('is_admin');
        });
    }
}
