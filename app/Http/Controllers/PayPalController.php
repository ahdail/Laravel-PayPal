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

        //dd($paypay->generate());
        return redirect()->away($paypay->generate());
    }
    
    public function returnPayPal(Request $request)
    {
        $success    = ($request->success == 'true') ? true : false;
        $paymentId  = $request->paymentId;
        $token      = $request->token;
        $payerID    = $request->PayerID;

        if( !$success )
            dd('Pedido Cancelado!!!');

        $cart = new Cart;
        $paypal = new PayPal($cart);
        $paypal->execute($paymentId, $token, $payerID);
    }
}
