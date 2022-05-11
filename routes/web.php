<?php

// use Illuminate\Support\Facades\App;

use App\Http\Livewire\ProductDetail;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', App\Http\Livewire\Home::class);

Route::get('/product', \App\Http\Livewire\ProductIndex::class)->name('product');
Route::get('/product/liga/{ligaid}', \App\Http\Livewire\ProductLiga::class)->name('product-liga');
Route::get('/product/{id}', ProductDetail::class)->name('product-detail');

