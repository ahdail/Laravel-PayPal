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

$this->get('/', 'StoreController@index')->name('home');
$this->get('carrinho', 'CartController@index')->name('cart');
$this->get('meu-prefil', 'UserController@profile')->name('user.profile');
//$this->get('add-cart/{id}', 'CartController@add')->name('add.cart');
$this->get('adicionar-carrinho/{id}', 'CartController@add')->name('add.cart');