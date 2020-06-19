<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;

class CarSale extends Model
{
    //
    public function index(){

        return view('car_sale');
    }
}
