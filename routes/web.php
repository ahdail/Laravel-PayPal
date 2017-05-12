<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
$this->get('/', 'StoreController@index')->name('home');
$this->get('carrinho', 'CartController@index')->name('cart');
//$this->get('add-cart/{id}', 'CartController@add')->name('add.cart');
$this->get('adicionar-carrinho/{id}', 'CartController@add')->name('add.cart');
$this->get('decrementar-carrinho/{id}', 'CartController@decrement')->name('decrement.cart');

$this->get('logout', 'UserController@logout')->name('user.logout');


$this->group(['middleware' => 'auth'], function(){
	$this->get('meu-prefil', 'UserController@profile')->name('user.profile');
	$this->post('atualizar-perfil', 'UserController@profileUpdate')->name('update.profile');
	
	$this->get('minha-senha', 'UserController@password')->name('user.password');
	$this->post('atualizar-senha', 'UserController@passwordUpdate')->name('update.password');

	//PayPal - Payment
	$this->get('return-paypal', 'PayPalController@returnPayPal')->name('return.paypal');
	$this->get('paypal', 'PayPalController@paypal')->name('paypal');
});