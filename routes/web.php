<?php

use App\Http\Controllers\Main\IndexContoller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Main'], function() {

    Route::get('/', IndexContoller::class);
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix'=> 'admin'], function() {

    Route::group(['namespace' => 'Main'],function (){

        Route::get('/', 'IndexContoller');
    });

    Route::group(['namespace' => 'Category', 'prefix'=>'categories'],function (){

        Route::get('/', 'IndexContoller')->name('admin.category.index');
        Route::get('/create', 'CreateContoller')->name('admin.category.create');
        Route::post('/', 'StoreContoller')->name('admin.category.store');
    });



});


Auth::routes();


