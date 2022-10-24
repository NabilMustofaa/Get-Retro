<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\transaction;
use Illuminate\Http\Request;

class checkout extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = transaction::where('userId',auth()->user()->id)->get();
        return view('checkout',[
            'title'=>'Retro|Checkout',
            'transaction'=>$transaction
        ]);
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
        $carts = cart::where('userId',$request->userId)->get();
        foreach ($carts as $cart) {
            $data = ([
                'productId'=>$cart->productId,
                'userId'=>$cart->userId,
                'quantity'=>$cart->quantity,
                'subTotal'=>$cart->subTotal,
                'status'=>'unpackaged'
            ]);
            transaction::create($data);
            cart::destroy($cart->id);
        }
        return redirect()->back()->with('success', 'Pesanan sedang diproses');
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
