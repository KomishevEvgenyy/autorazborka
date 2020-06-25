<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarSaleRequest;
use App\Models\CarSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // метод который выводит все автомобили
        $carSale = CarSale::get();
        return view('auth.car_sales.index ', compact('carSale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // метод для создания товара (автомобиль)
        $carSales = CarSale::get();
        return view('auth.car_sales.form', compact('carSales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarSaleRequest $request)
    {
        // метод для сохранения товара
        $params = $request->all();
        unset($params['image1']);
        /*unset($params['image2']);
        unset($params['image3']);
        unset($params['image4']);
        unset($params['image5']);*/

        if($request->has('image1')) {
            $path1 = $request->file('image1')->store('car_sales');
            $params['image1'] = $path1;
        }/*
        if($request->has('image2')) {
            $path2 = $request->file('image2')->store('car_sales');
            $params['image2'] = $path2;
        }
        if($request->has('image3')) {
            $path3 = $request->file('image3')->store('car_sales');
            $params['image3'] = $path3;
        }
        if($request->has('image4')){
            $path4 = $request->file('image4')->store('car_sales');
            $params['image4'] = $path4;
        }
        if($request->has('image5')){
            $path5 = $request->file('image5')->store('car_sales');
            $params['image5'] = $path5;
        }*/
        CarSale::create($params);

        return redirect()->route('car_sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarSale $carSale)
    {
        // метод для отображения товара
        return view('auth.car_sales.show', compact('carSale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CarSale $carSale)
    {
        // метод для внесения изменений в товар

        return view('auth.car_sales.form', compact('carSale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarSaleRequest $request, CarSale $carSale)
    {
        // метод для редактирования товара
        $params = $request->all();
        unset($params['image1']);
        unset($params['image2']);
        unset($params['image3']);
        unset($params['image4']);
        unset($params['image5']);

        if($request->has('image1')) {
            Storage::delete($carSale->image1);
            $path1 = $request->file('image1')->store('car_sales');
            $params['image1'] = $path1;
        }
        if($request->has('image2')) {
            Storage::delete($carSale->image2);
            $path2 = $request->file('image2')->store('car_sales');
            $params['image2'] = $path2;
        }
        if($request->has('image3')) {
            Storage::delete($carSale->image3);
            $path3 = $request->file('image3')->store('car_sales');
            $params['image3'] = $path3;
        }
        if($request->has('image4')){
            Storage::delete($carSale->image4);
            $path4 = $request->file('image4')->store('car_sales');
            $params['image4'] = $path4;
        }
        if($request->has('image5')){
            Storage::delete($carSale->image5);
            $path5 = $request->file('image5')->store('car_sales');
            $params['image5'] = $path5;
        }
        CarSale::update($params);

        return redirect()->route('car_sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarSale $carSale)
    {
        // метод для удаления товара
        $carSale->delete();
        return redirect()->route('car_sales.index');
    }
}
