<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\EmployeSalaryController;


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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('singup', [AuthController::class,'singup']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});

Route::apiResource('employee',EmployeeController::class);
Route::apiResource('supplier',SupplierController::class);
Route::apiResource('category',CategoryController::class);
Route::apiResource('products',ProductController::class);
Route::put('stock/update/{id}',[ProductController::class,'stockUpdate']);
Route::apiResource('expense',ExpenseController::class);

Route::post('give/salary/{id}',[SalaryController::class,'give_salray']);
Route::get('salary',[SalaryController::class,'index']);
Route::get('salary/show/{id}',[SalaryController::class,'show']);

Route::apiResource('customer',CustomerController::class);
Route::get('category/product/{id}',[ProductController::class,'getcategoryproduct']);
Route::get('add/cart/{id}',[CartController::class,'addcart']);
Route::get('get/card/product',[CartController::class,'allcartProduct']);
Route::delete('remove/cart/{id}',[CartController::class,'removeItem']);
Route::get('cart/product/increment/{id}',[CartController::class,'increment']);
Route::get('cart/product/decrement/{id}',[CartController::class,'decrement']);
Route::get('get/vat',[CartController::class,'vat']);
Route::post('order/done',[CartController::class,'order_done']);

Route::get('order',[OrderController::class,'todayOrder']);
Route::get('order/details/{id}',[OrderController::class,'orderDetails']);
Route::get('order/order-details/{id}',[OrderController::class,'orderDetailsAll']);
Route::post('search/order',[OrderController::class,'searchOrder']);
Route::get('today/sell',[OrderController::class,'TodaySell']);
Route::get('today/income',[OrderController::class,'Todayincome']);
Route::get('today/due',[OrderController::class,'Todaydue']);
Route::get('today/expense',[OrderController::class,'Todayexpense']);

