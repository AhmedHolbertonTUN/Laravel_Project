<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all products
        $products = Product::latest()->paginate(4);
        return view('product.index', compact('products'));
    }
    public function trash()
    {
        //show all products
        $products = Product::onlyTrashed()->latest()->paginate(4);
        return view('product.trash', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //add product form (page)
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add product to DataBase
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = Product::create($request->all());
        return redirect()->route('products.index')
            ->with('msg', "product added with success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //show one product
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //edit form (page)
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //update a product from DataBase
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('msg', "product updated with success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //Delete a product
        $product->delete();
        return redirect()->route('products.index')
            ->with('msg', "product deleted with success");
    }

    public function softDelete($id)
    {
        //SoftDelete a product
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')
            ->with('msg', "product deleted with success");
    }

    public function backToList($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first()->restore();

        return redirect()->route('products.index')
            ->with('msg', 'product restored successfully');
    }

    public function hardDelete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->forceDelete();

        return redirect()->route('trash')
            ->with('msg', 'product definitely removed');
    }
}
