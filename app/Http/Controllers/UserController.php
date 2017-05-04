<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
    	$title = "Meu perfil";
    	return view ('store.user.profile', compact('title'));
    }
}
