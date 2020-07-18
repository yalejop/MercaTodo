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

Route::get('/', 'HomeController@index')->middleware('verified');

Route::get('/noadmin', function() {
    return 'No tienes permisos para acceder a esa ruta';
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('users', 'UserController')->middleware('verified');

Route::patch('usuarios/{id}', 'UserController@changeStatus')->name('changeStatus')->middleware('verified');

Route::resource('/role', 'RoleController')->names('role');

Route::resource('/products', 'ProductController')->names('products');