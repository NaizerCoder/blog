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

/*PERSONAL*/
Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix'=> 'personal', 'middleware' => ['auth','verified'] ], function() {

    Route::group(['namespace' => 'Main'],function (){

        Route::get('/', 'IndexController')->name('personal.main.index');
    });

    Route::group(['namespace' => 'Likes', 'prefix'=>'likes'],function (){

        Route::get('/', 'IndexController')->name('personal.like.index');
        Route::get('/{post}','ShowController')->name('personal.like.show');
        Route::delete('/{post}','DestroyController')->name('personal.like.delete');

    });

    Route::group(['namespace' => 'Comment', 'prefix'=>'comment'],function (){

        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit','EditController')->name('personal.comment.edit');
        Route::patch('/{comment}','UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}','DestroyController')->name('personal.comment.delete');

    });

});

/*ADMIN*/
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix'=> 'admin', 'middleware' => ['auth','admin','verified'] ], function() {

    Route::group(['namespace' => 'Main'],function (){

        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix'=>'post'],function (){

        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}','ShowController')->name('admin.post.show');
        Route::get('/{post}/edit','EditController')->name('admin.post.edit');
        Route::patch('/{post}','UpdateController')->name('admin.post.update');
        Route::delete('/{post}','DestroyController')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix'=>'category'],function (){

        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}','ShowController')->name('admin.category.show');
        Route::get('/{category}/edit','EditController')->name('admin.category.edit');
        Route::patch('/{category}','UpdateController')->name('admin.category.update');
        Route::delete('/{category}','DestroyController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix'=>'tag'],function (){

        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}','ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit','EditController')->name('admin.tag.edit');
        Route::patch('/{tag}','UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}','DestroyController')->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix'=>'user'],function (){

        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}','ShowController')->name('admin.user.show');
        Route::get('/{user}/edit','EditController')->name('admin.user.edit');
        Route::patch('/{user}','UpdateController')->name('admin.user.update');
        Route::delete('/{user}','DestroyController')->name('admin.user.delete');
    });

});

Auth::routes(['verify' => true]);

