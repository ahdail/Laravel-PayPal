<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function profile()
    {
    	$title = "Meu perfil";
    	return view ('store.user.profile', compact('title'));
    }

    public function profileUpdate(Request $request, User $user)
    {
    	$this->validate($request, $user->rulesProfile);

    	$user = User::find(auth()->user()->id);
    	$user->name = $request->name;
    	//dd($request->name);
    	$user->save();

    	return redirect()->route('user.profile')->with('success', 'Perfil Atualizado com sucesso!'); 
    }


    public function password()
    {
    	$title = "My Password";
    	return view ('store.user.password', compact('title'));
    }

    public function passwordUpdate(Request $request, User $user)
    {

    	$this->validate($request, $user->rulesPassword);

    	$user = User::find(auth()->user()->id);
    	$user->password = bcrypt($request->password);
    	//dd($request->name);
    	$user->save();

    	return redirect()->route('user.password')->with('success', 'Senha Atualizado com sucesso!'); 
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('home');
    }
}
