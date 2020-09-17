<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // данные пользователя с правами администратора которые будут созданы при миграции командой
        // php artisan migrate:fresh --seed которая перезапустит миграции и обновит базу данных
        DB::table('users')->insert([
            'name' => 'Администратор',
            'email' => 'sashkaboss@gmail.com',
            'password' => bcrypt('sashkaboss2020'),
            'is_admin' => 1,
        ]);
    }
}
