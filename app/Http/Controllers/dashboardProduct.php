<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\product;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class dashboardProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product',[
            'title'=>'Get.Retro',
            'products'=>product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formProduct',[
            'title'=>'Get.Retro',
            'categories'=>category::all(),
            'brands'=>brand::all()
        ]);
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
            'productName'=>'required|max:255|unique:products',
            'productPrice'=>'required',
            'productDescription'=>'required',
            'productLeft'=>'required',
            'image'=> 'image|file|max:2048',
            'categoryId'=> 'required',
            'brandId'=> 'required',

        ]);
        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('product-images');
        }

        product::create($validatedData);

        return redirect('/dashboard/product')->with('success','Product baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('editProduct',[
            'title'=>'Get.Retro',
            'categories'=>category::all(),
            'brands'=>brand::all(),
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $rules=([
            'productPrice'=>'required',
            'productDescription'=>'required',
            'productLeft'=>'required',
            'image'=> 'image|file|max:2048',
            'categoryId'=> 'required',
            'brandId'=> 'required',

        ]);
        

        if($request->productName != $product->productName ){
            $rules['productName']='required|max:255|unique:products';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image']=$request->file('image')->store('product-images');
        }
        

        product::where('id',$product->id)->update($validatedData);

        return redirect('/dashboard/product')->with('success','Product telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if($product->image){
            Storage::delete($product->image);
        }
        transaction::where('productId',$product->id)->delete();
        product::destroy($product->id);
        
        return redirect('/dashboard/product')->with('success','Product terhapus');
    }
}
