<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();
        return view('products.index', ['products' => $products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2'
        ]);

        $product = new Products;
        $product->name = request('name');
        $product->qty = request('qty');
        $product->price = request('price');
        $product->description = request('description');
        $product->save();

        return redirect(route('products.index'));
    }
    public function edit(Products $products){
        return view('products.edit', ['product' => $products]);
    }
    public function update(Products $products, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required'
        ]);
        $products->update($data);
        return redirect(route('products.index'))->with('success', 'Product Updated Sucesfully');
    }
    public function destroy(Products $products){
       $products->delete();
       return redirect(route('products.index'))->with('success', 'Product Deleted Sucesfully');
    }
}
