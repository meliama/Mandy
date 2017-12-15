<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/faqs', 'FaqsController@index')->name('faqs');
Route::get('/profile', 'ProfileController@show')->name('profile');

Route::get('/edit-profile', 'ProfileController@verEditProfile')->name('edit');
Route::post('/edit-profile', 'ProfileController@editPerfil');

//Route::put('/edit-profile/{id}', 'ProfileController@updatePerfil')->name('edit');

// This route name uses the methods auto-created by the controller using --resource
// names available (see php artisan route:list) are seller.index, seller.show, seller.update, etc.
Route::resource('/sellers', 'SellerController');

// This route name uses the methods auto-created by the controller using --resource
// names available (see php artisan route:list) are products.index, .show, .update, etc.
Route::resource('/products', 'ProductController');
Route::get('/products/{id}/fotos', 'ProductController@editFotos')->name('fotoform');
Route::post('/products/{id}/fotos', 'ProductController@addFotos')->name('fotoform');
Route::get('/products{search?}', 'ProductController@searchProduct')->name('products.search');
// Route::get('/products/index', 'ProductController@index');  // ya cubierto en Route::resource
// Nay's página, on backup
Route::get('/products2', 'ProductController@index2');
Route::delete('/products/{id}/fotos', 'ProductController@deleteFotos')->name('foto.destroy');
