<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayPal;
use App\Models\Cart;
use App\Models\Order;

class PayPalController extends Controller
{
    public function __construct()
    {
        $this->middleware('cart-items');
    }

    public function paypal()
    {
        $cart = new Cart;
        $paypay = new PayPal($cart);

        return redirect()->away($paypay->generate());
    }

    public function returnPayPal(Request $request, Order $order)
    {
        $success    = ($request->success == 'true') ? true : false;
        $paymentId  = $request->paymentId;
        $token      = $request->token;
        $payerID    = $request->PayerID;

        if( !$success )
            dd('Pedido Cancelado!!!');

        $cart = new Cart;
        $paypal = new PayPal($cart);
        $response = $paypal->execute($paymentId, $token, $payerID);

        if( $response == 'approved' ){
            $order->where('payment_id', $paymentId)
                ->update(['status' => 'approved']);

            return redirect()->route('home');
        } else {
            dd('Pedido não aprovado!');
        }
    }
}