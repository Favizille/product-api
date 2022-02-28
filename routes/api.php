<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products',[ProductController::class, 'viewAllProducts']);
Route::post('products',[ProductController::class, 'createProduct']);
Route::get('searchProduct/{slug}', [ProductController::class, 'searchProduct']);
Route::post('updateProduct/{id}',[ProductController::class, 'editProduct']);
Route::get('deleteproduct/{id}',[ProductController::class, 'deleteProduct']);
