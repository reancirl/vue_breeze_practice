<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'edit_url' => \URL::route('products.edit', $product),
                'status' => $product->status == 'active' ? 'Disable Status' : 'Enable Status',
                'status_update_url' => \URL::route('productStatusUpdate', $product),
            ];
        });

        return Inertia::render('products/Index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('products/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $data = new Products;
        $data->fill($validated);
        $data->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return Inertia::render('products/Edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $product->fill($validated);
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Products $product)
    {
        $product->status = $product->status == 'active' ? 'inactive' : 'active';
        $product->save();

        return redirect()->back();
    }
}
