<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

class CartController extends Controller
{
    public function index()
    {	
    	$title = "Meu Carrinho - T-Shirt Art";

    	//$cart = Session::get('cart');
    	$cart = Session::has('cart') ? Session::get('cart') : new Cart;
    	$total = $cart->total();

    	//dd($cart->getItems());
    	$products = $cart->getItems();

    	return view ('store.cart.index', compact('title', 'products', 'total'));
    }

    public function add(Request $request, $id)
    {
    	$product = Product::find($id);
    	if (!$product)
    		return redirect()->route('home');

    	$cart = new Cart;
    	$cart->add($product);

    	$request->session()->put('cart', $cart);

    	return redirect()->route('cart');
    }

    public function decrement(Request $request, $id){
    	$product = Product::find($id);
    	if (!$product)
    		return redirect()->route('home');

    	$cart = new Cart;
    	$cart->decrementItem($product);

    	$request->session()->put('cart', $cart);

    	return redirect()->route('cart');
    }

    
}
