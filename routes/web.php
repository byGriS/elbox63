<?php

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
Route::get('login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/', function(){
  return redirect(route('catalog'));
});
Route::get('/catalog', 'App\Http\Controllers\Front\IndexController@catalog')->name('catalog');
Route::get('/product/{slug}', 'App\Http\Controllers\Front\ProductController@show')->name('product.show');

Route::middleware('auth')->prefix('admin')->group(function(){
  Route::post('/upload', 'App\Http\Controllers\Admin\UploadContorller@upload');

  Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
  Route::post('/products/deleteSelected', 'App\Http\Controllers\Admin\ProductController@deleteSelected');
});


