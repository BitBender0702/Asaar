<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LocalizationController;

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
    $categories=DB::table('categories')->where('categories.display',1)->get();
    $marches=DB::table('types')->where('types.display',1)->get();
    return view('welcome',[
        'categories'=>$categories,
        'marches'=>$marches
    ]);
})->name('welcome');
Route::get('/detail/{idCategory}/{id}',[ProductController::class,'getDetail'])->name('getDetail');
Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');
Route::get('/contactUs', function () {
    return view('contactUs');
})->name('contactUs');
    
Route::get('/getProductsFromCat/{list_category}',[ProductController::class,'getProductsFromCat'])->name('getProductFromCat');
Route::get('/getNationalPrice/{list_products}/{period}/{type}',[ProductController::class,'getNationalPrice'])->name('getNationalPrice');
Route::get('/getVilleByRegion/{idProd}',[ProductController::class,'getVilleByRegion'])->name('getVilleByRegion');
Route::post('contactAdmin',[ProductController::class,'contacter'])->name('contact_admin');
Route::get('lang/{locale}', [LocalizationController::class,'index']);
Route::get('/getFooter',[ProductController::class,'getFooter'])->name('getFooter');
