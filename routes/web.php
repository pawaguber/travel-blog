<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
    Route::get('/search', SearchController::class)->name('main.search');
});

Route::group(['namespace' => 'App\Http\Controllers\Categories'], function () {
    Route::get('categories', IndexController::class)->name('category.index');
    Route::get('{category}', ShowController::class)->name('category.show');
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'middleware' => 'test'], function (){
    Route::get('post/{post}', ShowController::class)->name('post.show');

});

Route::group(['namespace' => 'App\Http\Controllers\Post\Like'], function (){
    Route::post('/like', StoreController::class)->name('post.like.store');
    Route::delete('/unlike', DestroyController::class)->name('post.like.destroy');
});
Route::group(['namespace' => 'App\Http\Controllers\Post\Comment'], function (){
    Route::post('/comment', StoreController::class)->name('post.comment.store');
});


Route::group(['namespace' => 'App\Http\Controllers\Profile', 'prefix' => 'profile', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class);
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
