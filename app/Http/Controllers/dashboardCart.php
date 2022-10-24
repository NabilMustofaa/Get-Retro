<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardCart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=cart::where('userId', auth()->user()->id)->get();

        return view('cart',[
            'title'=>'Retro|Cart',
            'cart'=>$cart,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData =$request->validate([
            'productId'=>'required',
            'userId'=>'required',
            'quantity'=>'required',
            
        ]);
        $validatedData['subTotal']= $request->quantity * $request->price;

        cart::create($validatedData);

        if ($request->option ) {
            return redirect('/cart');
        }
        else {
            return redirect()->back()->with('alert', 'Item telah ditambahkan kedalam cart');
        }
        

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
    public function update(Request $request, cart $cart)
    {
        $rules=([
            'quantity'=>'required'
        ]);
        
        
        $validatedData = $request->validate($rules);
        $validatedData['subTotal']= $request->quantity * $cart->product->productPrice;

        cart::where('id',$cart->id)->update($validatedData);

        return redirect()->back() ->with('alert', 'Quantity telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        cart::destroy($cart->id);
        
        return redirect()->back() ->with('alert', 'Item telah terhapus');
    }
}
