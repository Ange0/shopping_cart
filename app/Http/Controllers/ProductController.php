<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct(){

        $products=Product::all();
       // dd($products);
        return view('shop.index',['products'=>$products]);
    }
}
