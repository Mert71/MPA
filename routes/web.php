<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ProductController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::redirect('/', 'home');

Auth::routes();

//index routes
Route::get('/home', 'ProductController@index')->name('home');

//Cart Crud Routes
Route::get('/add-to-cart/{id}' , 'ProductController@getAddToCart') ->name('product.addToCart');
Route::get('/cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('/cart/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');
Route::get('/cart/remove/{id}', 'ProductController@getRemoveItem')->name('product.remove');
Route::get('/cart/update/{id}', 'ProductController@getAddByOne')->name('product.addByOne');

Route::get('/checkout', 'ProductController@postCheckout') ->name('checkout');

//Category Routes
Route::get('/category/HipHop' , 'CategoryController@sortHipHop') ->name('category.hiphop');
Route::get('/category/Rock' , 'CategoryController@sortRock') ->name('category.rock');
Route::get('/category/Jazz' , 'CategoryController@sortJazz') ->name('category.jazz');
Route::get('/category/Soul' , 'CategoryController@sortSoul') ->name('category.soul');
Route::get('/category/Pop' , 'CategoryController@sortPop') ->name('category.pop');

//Order Routes
Route::get('/order' , 'OrderController@index') -> name('order.index');
