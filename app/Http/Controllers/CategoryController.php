<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Category::with("product")->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Category
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'       => 'required|string|min:5',
        ]);
        if(!$validate){
            return $validate;
        }
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        $category->status()->sync($validate['status']);
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Category
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Category
     */
    public function update(Request $request, Category $category)
    {

        $validate = $request->validate([
            'name'       => 'required|string|min:5',
        ]);
        if(!$validate){
            return $validate;
        }
        $category->fill($request->all());
        $category->save();
        $category->category()->sync($validate['categories']);
        return $category;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return bool
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return true;
        }
    }
}
