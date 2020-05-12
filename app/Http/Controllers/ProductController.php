<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Product
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'        => 'required|string|min:5',
            'description'       => 'required|min:20',
            'price'       => 'required|min:3',
            'categories'  => 'required',
        ]);

        $product = new Product();
        $product->fill($validate);
        $product->save();
        $product->category()->sync($validate['categories']);
        $product->status()->sync($validate['status']);
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return Product
     */
    public function show(Product $product)
    {
        return $product;
    }
    public function update(Request $request ,Product $product)
    {

        $validate = $request->validate([
            'name'        => 'required|string|min:5',
            'description' => 'required|min:20',
            'price'       => 'required|min:3',
            'categories'  => 'required',
        ]);

        $product->fill($validate);
        $product->save();
        $product->category()->sync($validate['categories']);
        $product->status()->sync($validate['status']);

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Product
     * @throws \Exception
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $product;
    }
}
