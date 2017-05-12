<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayPal;
use App\Models\Cart;


class PayPalController extends Controller
{
    public function __construct()
    {
        $this->middleware('cart-items');
    }

    public function paypal()
    {
        $cart = New Cart();
        $paypay = new PayPal($cart);
        
        return redirect()->away($paypay->generate());
    }
    
    public function returnPayPal(Request $request)
    {
        dd($request->all());
    }
}
