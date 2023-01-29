<?php

namespace App\Http\Controllers;

use COM;
use Session;
use DateTime;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;



class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function stripe()
    {
        return view('checkout.stripe');
    }




    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => round(Cart::total()),
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "C'est un paiement test",
        ]);
      
$order=new Order();

$order->amount=Cart::total();
$order->name_user=Auth::user()->name;
$products=[];
$i=0;
foreach(Cart::content() as $product){
    $products['product_'. $i][]=$product->name;
    $products['product_'. $i][]=$product->price;
    $products['product_'. $i][]=$product->qty;
    $i++;
}
$order->products=serialize($products);
$order->user_id=Auth::user()->id;
$order->save();
        Cart::destroy();
        return redirect()->route('acceuil')->with('success', 'Votre achat  a été validé avec succès');
    }

 public function index(){
    return view('checkout.index');


    //         Stripe::setApiKey('sk_test_VePHdqKTYQjKNInc7u56JBrQ');
    //         $intent= PaymentIntent::create([
    //         'amount'=>round(Cart::total()),
    //         'currency'=>'eur',


    //     ]);

    // $clientSecret = Arr::get($intent,'client_secret');
    //     return view('Checkout.index', [
    //         'clientsecret'=>$clientSecret
    //     ]);


    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request)
    {

// #items: array:2 [▼
// "6a10b4c56257dca6b1c6ca07d436c721" => Gloudemans\Shoppingcart\CartItem {#319 ▼
//     +rowId: "6a10b4c56257dca6b1c6ca07d436c721"
//     +id: 2
//     +qty: 1
//     +name: "Sac XP"
//     +price: 15.0
//     +options: Gloudemans\Shoppingcart\CartItemOptions {#320 ▼
//       #items: array:1 [▼
//         "wenig-antivol-sac-dos-ordinateur-portable-156-pouces-homme-impermable.jpg" => "image"
//       ]
//       #escapeWhenCastingToString: false
//     }
//     -associatedModel: "App\Product"
//     -taxRate: 21
//     -isSaved: false
//   }
//   "c3a1518c512e28f39eeec3ef311ab62e" => Gloudemans\Shoppingcart\CartItem {#321 ▶}
// ]
// #escapeWhenCastingToString: false



    }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
