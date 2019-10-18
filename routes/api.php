<?php

Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category', function () {
    return response()->json([
        'categories' => CategoryController::index()
    ], 200);
});

Route::get('product', function () {
    return response()->json([
        'products' => ProductController::index()
    ], 200);
});

Route::get('product/{id}', function ($id) {
    return response()->json([
        'product' => ProductController::show($id)
    ], 200);
});
