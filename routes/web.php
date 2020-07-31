<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'InicioController@index')->name('inicio.index');

//Route::get('/', 'HomeController@index')->middleware('verified');

/* Route::get('/noadmin', function() {
    return 'No tienes permisos para acceder a esa ruta';
}); */

//Products search
Route::get('/search', 'ProductController@search')->name('search.show');

/* Route::get('/home', 'HomeController@index')->name('home')->middleware('verified'); */

Route::resource('users', 'UserController');

Route::put('usuarios/{id}', 'UserController@changeStatus')->name('changeStatus');

Route::resource('/role', 'RoleController')->names('role');

Route::resource('/products', 'ProductController')->names('products');

Route::put('/productos/{id}', 'ProductController@changeStatusProducts')->name('changeStatusProducts');

Auth::routes(['verify' => true]);