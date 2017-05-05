<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {	
    	$title = "Meu Carrinho - T-Shirt Art";
    	return view ('store.cart.index', compact('title'));
    }

    public function add($id)
    {
    	return "Adicionado o produto {$id} no carrinho";
    }
}
