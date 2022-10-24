<?php

use App\Http\Controllers\checkout;
use App\Http\Controllers\dashboardCart;
use App\Http\Controllers\dashboardProduct;
use App\Http\Controllers\dashboardTransaction;
use App\Http\Controllers\usercontroller;
use App\Http\Middleware\admincheck;
use App\Models\brand;
use App\Models\category;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $new= product::all()->take(9);
    return view('home',[
        'title'=>'Get.Retro',
        'new'=>$new
    ]);
});


Route::get('/category', function () {
    
    return view('category',[
        'title'=>'Retro|Brand',
        'categories'=>category::all()
    ]);
});

Route::get('/brand', function () {
    return view('brand',[
        'title'=>'Retro|Brand',
        'brands'=>brand::all()
    ]);
});

Route::get('/shop', function () {
    
    $recommended= product::latest()->take(3)->get();
    $new= product::all()->take(3);

    return view('shop',[
        'title'=>'Retro|Shop',
        'new'=>$new,
        'recommended'=>$recommended,
        'products'=>product::all()
    ]);
});

Route::get('/shop/{id}', function ($id) {
    $product=product::find($id);


    return view('detailShop',
        [
            'title'=>'Retro|Product',
            'product'=>$product
        ]
    );
});

Route::get('/category/{id}', function ($id) {
    $products = product::where('categoryId',$id)->get();
    $category = category::find($id);
    return view('list',
        [
            'title'=>'Retro|Product',
            'name'=>$category->categoryName,
            'products'=>$products
        ]);
});

Route::get('/brand/{id}', function ($id) {
    $products = product::where('brandId',$id)->get();
    $brand = brand::find($id);
    return view('list',
        [
            'title'=>'Retro|Product',
            'name'=>$brand->brandName,
            'products'=>$products
        ]);
});

Route::get('/dashboard', function () {
    return view('dashboard',[
        'title'=>'Get.Retro'
    ]);
})->middleware('auth','admincheck:1');

//user login
Route::get('/register',[usercontroller::class,'register']);
Route::post('/register',[usercontroller::class,'postRegister']);
Route::get('/login',[usercontroller::class,'login'])->middleware('guest')->name('login');
Route::post('/login',[usercontroller::class,'authenticate']);
Route::post('logout',[usercontroller::class,'logout']);

Route::resource('/cart',dashboardCart::class)->middleware(['auth','admincheck:0']);
Route::resource('/checkout',checkout::class)->middleware(['auth','admincheck:0']);
Route::resource('/dashboard/transaction',dashboardTransaction::class)->middleware(['auth','admincheck:1']);
Route::resource('/dashboard/product',dashboardProduct::class)->middleware(['auth','admincheck:1']);

Route::get('/tes',function(){
    Artisan::call('storage:link');
});



