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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'ProductController');

Route::get('product/SoftDelete/{id}', 'ProductController@softDelete')->name('SoftDelete');

Route::get('product/trashed', 'ProductController@trash')->name('trash');

Route::get('product/restore/{id}', 'ProductController@backToList')->name('restore');

Route::get('product/hardDelete/{id}', 'ProductController@hardDelete')->name('remove');
