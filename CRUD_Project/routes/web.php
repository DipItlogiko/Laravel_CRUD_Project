<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProductController::class,'index'])->name('products.index');


Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{id}/show',[ProductController::class,'show']);
Route::get('/products/{id}/edit',[ProductController::class,'edit']);

Route::put('/products/{id}/update',[ProductController::class,'update']);//// jokhon amra kono record ke edit ba update korbo tokhon route ar 2ta method use korte pari put() ba patch()

Route::get('/products/{id}/delete',[ProductController::class,'destroy']);