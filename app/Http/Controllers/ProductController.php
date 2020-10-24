<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;
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
    public function postCheckout(Request $request){
        if(!$request->session()->has('cart')){
            return redirect()->route("product.shoppingCart");
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_51HdbNoIvcdlShppOjkPFKAPYD39qtmkbZUxUGddiFt71Wh5Ho50giDRquLfPLQOUrxe7usDISgvqHvBHorOOu1zs006WdsPJIx');
        try {
            $charge = Charge::create([
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'),
                "description" => "Test charge"
            ]);
            $order = new Order();
            $order->cart = serialize($cart);
            $order->name = $request->input('name');
            $order->address = $request->input('address');
            $order->payment_id= $charge->id;
            
            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return  redirect()->route('checkout')->with('error',$e->getMessage());
        }
        $request->session()->forget('cart');
        return redirect()->route('product.index')->with('success','SuccessFully purcharsed products !');
    }
}
