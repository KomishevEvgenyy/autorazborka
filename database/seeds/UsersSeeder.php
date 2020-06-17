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
            'email' => 'admin23@example.com',
            'password' => bcrypt('admin23'),
            'is_admin' => 1,
        ]);
    }
}
