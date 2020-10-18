<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
class ProductController extends Controller
{
    public function getProduct(){

        $products=Product::all();
       // dd($products);
        return view('shop.index',['products'=>$products]);
    }

    public function getAddToCart(Request $request ,$id){
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }

    public function getCart(Request $request){
        if(!$request->session()->has('cart')){
            return view("shop.shopping-cart");
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        return view("shop.shopping-cart",['products' => $cart->items , 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(Request $request){
        if(!$request->session()->has('cart')){
            return view("shop.shopping-cart");
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view("shop.checkout",['total' => $total]);
    }
}
