<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->get();
        return view('products.index')->with('products', $products);
    }

   public function show($id)
   {
       $product= Product::where('id', $id)->first();
       return view('products.show')->with('product', $product);
   }
}