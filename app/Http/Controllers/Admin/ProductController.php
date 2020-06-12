<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // метод который выводит все продукты
        $categories = Category::get();
        $products = Product::get();
        return view('auth.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // метод для создания товара
        $categories = Category::get();
        return view('auth.products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        // метод для сохранения товара
        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }
        Product::create($params);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        // метод для отображения товара
        $categories = Category::get();
        return view('auth.products.show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return void
     */
    public function edit(Product $product)
    {
        // метод для внесения изменений в товар
        $categories = Category::get();
        return view('auth.products.form', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function update(ProductRequest $request, Product $product)
    {
        // метод для редактирования товара
        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            Storage::delete($product->image);
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }

        $product->update($params);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return void
     */
    public function destroy(Product $product)
    {
        // метод для удаления товара
        $product->delete();
        return redirect()->route('products.index');
    }
}
