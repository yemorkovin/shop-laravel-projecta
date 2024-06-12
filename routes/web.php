<?php
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class, 'index']);
Route::post('/ajaxcolor', [IndexController::class, 'ajaxcolor']);

Route::get('/cart', [IndexController::class, 'cart']);
Route::get('/product/{id}', [IndexController::class, 'productid']);
Route::get('/cat/{id}', [IndexController::class, 'catid']);
Route::get('/order/{id}', [IndexController::class, 'orderid']);
Route::get('/simplecheckout', [IndexController::class, 'simplecheckout']);
Route::get('/faq', [IndexController::class, 'faq']);
Route::get('/about_us', [IndexController::class, 'about_us']);
Route::get('/dostavka', [IndexController::class, 'dostavka']);


Route::get('/infopotrebitel', [IndexController::class, 'infopotrebitel']);
Route::get('/garantiya', [IndexController::class, 'garantiya']);
Route::get('/dostavka', [IndexController::class, 'dostavka']);
Route::get('/reckclear', [IndexController::class, 'reckclear']);
Route::get('/politika', [IndexController::class, 'politika']);
Route::post('/deletecart', [IndexController::class, 'deletecart']);
Route::post('/ajaxupdatecart', [IndexController::class, 'ajaxupdatecart']);
Route::post('/countcart', [IndexController::class, 'countcart']);
Route::post('/addcart', [IndexController::class, 'addcart']);
Route::post('/addobr', [IndexController::class, 'addobr']);
Route::post('/addcartproductid', [IndexController::class, 'addcartproductid']);
Route::post('/ajaxupdatewush', [IndexController::class, 'ajaxupdatewush']);




Route::post('/addcartproduct', [IndexController::class, 'addcartproduct']);
Route::post('/getsumma', [IndexController::class, 'getsumma']);
Route::post('/addcartproductminus', [IndexController::class, 'addcartproductminus']);






Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
