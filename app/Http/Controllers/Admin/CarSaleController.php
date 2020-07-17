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
        $carSale = CarSale::paginate(10);
        return view('auth.car_sales.index', compact('carSale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // метод для создания товара (автомобиль)
        return view('auth.car_sales.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarSaleRequest $request)
    {
        dd($request);
        // метод для сохранения товара
        $params = $request->all();
        unset($params['image']);

        if($request->has('image')) {
            $path = $request->file('image')->store('car_sales');
            $params['image'] = $path;
        }
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
        unset($params['image']);
        if($request->has('image')) {
            Storage::delete($carSale->image);
            $path = $request->file('image')->store('car_sales');
            $params['image'] = $path;
        }

        $carSale->update($params);

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
