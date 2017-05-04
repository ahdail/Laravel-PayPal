<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
    	$title = "Home Page Laravel PayPal";
    	return view ('store.home.index', compact('title'));
    }
}
