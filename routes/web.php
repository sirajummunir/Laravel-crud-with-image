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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\ProductController@showProduct')->name('/');
Route::get('/singleProduct/{id}','App\Http\Controllers\ProductController@show')->name('singleProduct');

Route::get('/admin', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix'=>'/admin'], function(){
    Route::group(['prefix'=>'/product'], function(){
        Route::get('/manage','App\Http\Controllers\ProductController@index')->name('manage');
        Route::get('/create','App\Http\Controllers\ProductController@create')->name('create');
        Route::post('/insert','App\Http\Controllers\ProductController@store')->name('insert');
        Route::get('/edit/{id}','App\Http\Controllers\ProductController@edit')->name('edit');
        Route::post('/update/{id}','App\Http\Controllers\ProductController@update')->name('update');
        Route::get('/delete/{id}','App\Http\Controllers\ProductController@destroy')->name('delete');
    });
});

require __DIR__.'/auth.php';
