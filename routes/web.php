<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;

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

Route::get('/home', 'homeController@index')->name('home');


Route::get('/add-to-cart/{product}', 'cartController@add')->name('cart.add');

Route::get('/cart', 'cartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', 'cartController@destroy')->name('cart.destory');

Route::get('/cart/update/{itemId}', 'cartController@update')->name('cart.update')->middleware('auth');
