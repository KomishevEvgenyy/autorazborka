<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    /**
     * Контроллер который добавляет, удаляет, редактирует категории к товарам
     */
    public function index()
    {
        // метод который выводит все категории
        $categories = Category::paginate(5);
        return view('auth.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // метод для создания категории
        return view('auth.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // метод для сохранения категории

        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            $path = $request->file('image')->store('categories');
            $params['image'] = $path;
        }

        Category::create($params);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // метод для отображения категории
        return view('auth.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // метод для внесения изменений в категорию
        return view('auth.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //  метод для редактирования категории
        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            Storage::delete($category->image);
            $path = $request->file('image')->store('categories');
            $params['image'] = $path;
        }

        $category->update($params);
        // после внесения изменений в категорию осуществляется редирект на страницу index
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // метод для удаления категори
        $category->delete();
        // после удаления осуществляется редирект на страницу index
        return redirect()->route('categories.index');
    }
}
