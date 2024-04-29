<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/blogs', 'PublicPages@blogs');
Route::get('/allProducts', 'PublicPages@allProducts');
Route::get('/allCategories', 'PublicPages@allCategories');
Route::post('/productcategories', 'PublicPages@productcategories');
Route::get('/productcategories/{id}', 'PublicPages@productcategoriesss');

Route::post('/searchCategory', 'PublicPages@searchCategory');

Route::post('/carts', 'PublicPages@addtocart');

Route::post('/getcarts', 'PublicPages@getcartdata');
Route::put('/getcarts', 'PublicPages@updatecartdata');
Route::delete('/getcarts', 'PublicPages@deletecartdata');

Route::post('/addAddress', 'PublicPages@addAddress');
Route::post('/getAddress', 'PublicPages@getAddress');

Route::post('/placeOrder','PublicPages@placeOrder');

Route::post('/get_place_order','PublicPages@get_place_order');
Route::post('/get_place_order_details','PublicPages@get_place_order_details');

Route::post('/mr_login', 'PublicPages@mr');
Route::post('/update_mr_deatils', 'PublicPages@update_mr_deatil');
Route::post('/change_admin_password', 'PublicPages@updateAdminPassword');

Route::post('/add-enquiries', 'PublicPages@addenquiries');