<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [ApiController::class, 'logout']);
});

Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
Route::get('/getProfile/{id}', [ApiController::class, 'getProfile']);
Route::post('/updateProfile', [ApiController::class, 'updateProfile']);
Route::get('/getProduct', [ApiController::class, 'getProduct']);
Route::get('/bestProduct', [ApiController::class, 'bestProduct']);
Route::get('/getProductByLiga/{liga_id}', [ApiController::class, 'getProductByLiga']);
Route::get('/searchProduct/{nama_product}', [ApiController::class, 'searchProduct']);
Route::get('/getLiga', [ApiController::class, 'getLiga']);
Route::get('/getLigaById/{liga_id}', [ApiController::class, 'getLigaById']);
Route::get('/searchLiga/{nama_liga}', [ApiController::class, 'searchLiga']);
Route::get('/productDetail/{id}', [ApiController::class, 'productDetail']);
Route::post('/masukanKeranjang', [ApiController::class, 'masukanKeranjang']);
Route::post('/getPesananDetail', [ApiController::class, 'getPesananDetail']);
Route::post('/getTotalHarga', [ApiController::class, 'getTotalHarga']);
Route::post('/updatePesananDetail', [ApiController::class, 'updatePesananDetail']);
Route::post('/deletePesananDetailById', [ApiController::class, 'deletePesananDetailById']);
Route::post('/addWishlist', [ApiController::class, 'addWishlist']);
Route::post('/removeWihslist', [ApiController::class, 'removeWihslist']);
Route::get('/getWishlist/{user_id}', [ApiController::class, 'getWishlist']);
Route::get('/searchWishlist/{user_id}/{nama_product}', [ApiController::class, 'searchWishlist']);
Route::post('/addHistory', [ApiController::class, 'addHistory']);
Route::get('/getPaymentChannels', [ApiController::class,'getPaymentChannels']);
Route::post('/requestTranscation', [ApiController::class,'requestTranscation']);
