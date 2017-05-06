<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function profile()
    {
    	$title = "Meu perfil";
    	return view ('store.user.profile', compact('title'));
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('home');
    }
}
