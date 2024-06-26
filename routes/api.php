<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', function (){
    return response()->json('hello');
});

Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('coffees',CoffeeController::class);
Route::apiResource('tables',TableController::class);
Route::apiResource('admin',TableController::class);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout']);

Route::get('/admin/coffee', [AdminController::class, 'index']);
Route::post('/admin/coffee', [AdminController::class, 'store']);
Route::put('/admin/coffee/{id}', [AdminController::class, 'update']);
Route::delete('/admin/coffee/{id}', [AdminController::class, 'destroy']);
