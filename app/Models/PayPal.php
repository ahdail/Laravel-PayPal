<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use App\Models\Cart;

class PayPal extends Model
{
    private $apiContext;
    private $identify;
    private $cart;
    
    public function __construct(Cart $cart)
    {
        $this->apiContext = new ApiContext(
             new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret_id'))
        );
        
        $this->apiContext->setConfig(config('paypal.settings'));
        
        $this->identify = bcrypt(uniqid(date('YmdHis')));

        $this->cart = $cart;

    }
    
    public function generate()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        
        /**
        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('BRL')
            ->setQuantity(1)
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('BRL')
            ->setQuantity(5)
            ->setPrice(2);
         **/
        //dd($this->cart->getItems());
        $items = [];
        $itemsCart = $this->cart->getItems();
        foreach ( $itemsCart as $itemCart){
            $item = new Item();
            $item->setName($itemCart['item']->name)
                    ->setCurrency('BRL')
                    ->setQuantity($itemCart['qtd'])
                    ->setPrice($itemCart['item']->price);

            array_push($items, $item);
        }

        $itemList = new ItemList();
        $itemList->setItems($items);

        $details = new Details();
        $details->setSubtotal($this->cart->total());

       /* $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);*/
        
        $amount = new Amount();
        $amount->setCurrency("BRL")
            ->setTotal($this->cart->total())
            ->setDetails($details);
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Compra Loja - Laravel com PayPal")
            ->setInvoiceNumber($this->identify);
        
        $baseRoute = route('return.paypal');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("{$baseRoute}?success=true")
                    ->setCancelUrl("{$baseRoute}?success=false");
        
        
        $payment = new Payment();
        $payment->setIntent("order")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        
        
        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {
            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();
        
        return $approvalUrl;
    }
}