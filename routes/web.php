<?php

// use Illuminate\Support\Facades\App;

use App\Http\Controllers\Admin\ControllerAdmin;
use App\Http\Controllers\Admin\Product\ProductController;
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
// Auth::routes(['verify' => true]);
Route::middleware(['auth'])->group(function () {

    Route::get('/send-email', [ControllerAdmin::class,'sendEmail']);
    Route::get('/admin', [App\Http\Controllers\Admin\ControllerAdmin::class, 'dashboard']);
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    // Route::get('/home', App\Http\Livewire\Home::class);
    Route::get('/product/jersey', [App\Http\Controllers\Admin\ControllerAdmin::class, 'jersey']);
    Route::get('/product/addJersey', [App\Http\Controllers\Admin\ControllerAdmin::class, 'addJersey']);
    Route::get('/product/{jersey}/editJersey', [App\Http\Controllers\Admin\ControllerAdmin::class, 'editJersey']);
    Route::get('/product/liga', [App\Http\Controllers\Admin\ControllerAdmin::class, 'liga']);
    Route::get('/product/addLiga', [App\Http\Controllers\Admin\ControllerAdmin::class, 'addLiga']);

    // ACCOUNT
    Route::get('/account', [App\Http\Controllers\Admin\ControllerAdmin::class, 'viewAccount']);
    // PESANAN
    Route::get('/pesanan/details', [App\Http\Controllers\Admin\ControllerAdmin::class, 'viewPesananDetails']);

    // PRODUCT
    Route::post('/store', [ProductController::class, 'store']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::post('/delete/{id}', [ProductController::class, 'delete']);

    Route::get('/product', \App\Http\Livewire\ProductIndex::class)->name('product');
    Route::get('/product/liga/{ligaid}', \App\Http\Livewire\ProductLiga::class)->name('product-liga');
    Route::get('/product/{id}', ProductDetail::class)->name('product-detail');
});

