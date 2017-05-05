<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cart extends Model
{

	private $items = [];

	public function __construct()
	{
		if (Session::has('cart')){
			$cart = Session::get('cart');
			$this->items = $cart->items;
		}	
	}

    public function add(Product $product)
    {
    	if (isset ($this->items[$product->id])){
    		//dd($this->items[$product->id]['qtd']);
    		$this->items[$product->id] = [
    			'item' 	=> $product,
    			'qtd' 	=> $this->items[$product->id]['qtd'] + 1, 
    		];
    	} else {
    		$this->items[$product->id] = [
    			'item' 	=> $product,
    			'qtd' 	=> 1, 
    		];	
    	}
    }

    public function decrement(Product $product)
    {
    	if (isset ($this->items[$product->id])){
    		
    		if ($this->items[$product->id]['qtd'] == 1){
    			unset($this->items[$product->id]);
	    	} else {
	    		$this->items[$product->id] = [
	    			'item' 	=> $product,
	    			'qtd' 	=> $this->items[$product->id]['qtd'] - 1, 
	    		];
	    	}
	    }	
    }

    public function getItems()
    {
    	return $this->items;
    }


    
}

