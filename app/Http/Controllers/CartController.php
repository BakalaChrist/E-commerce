<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $item=Cart::content();
     return view('Cart.Panier')->with('item',$item);
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

    $duplicata = Cart::search(
        function ($cartItem, $rowId) use ($request) 
        { return $cartItem->id == $request->product_id;  
});


if($duplicata->isEmpty())
{
$product = Product::find($request->product_id);
Cart::add($product->id, $product->title, 1, $product->price,[$product->image =>'image']) ->associate('App\Product');
return redirect()->route('acceuil')->with('success', 'le produit ('.$product->title.') a bien été ajouté');

}

return redirect()->route('acceuil')->with('success', 'le produit a déjà été ajouté');




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
    public function update(Request $request, $rowId)
    {
        $data=$request->json()->all();
        Cart::update($rowId, $data['qty']);
        Session::flash('success', 'la qty modifier');
        return response()->json(['success' =>'cart modifier']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('Panier')->with('warning', 'le produit  a bien été supprimé');
    }


    public function Detruir(){
        Cart::destroy();
        return redirect()->route('acceuil')->with('danger', 'le panier  a bien été supprimé');
    }
}
