<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


Route::get('/',[ProductController::class,'getProduct'])->name('product.index');
Route::get('/add-to-cart/{id}',[ProductController::class,'getAddToCart'])->name('product.addToCart');
Route::group(['prefix' => 'user'],function(){
    Route::group(['middleware'],function(){
        Route::get('/signup',[UserController::class,'getSignUp'])->name('user.signup');
        Route::post('/signup',[UserController::class,'postSignUp'])->name('user.signup');
        Route::get('/signin',[UserController::class,'getSignIn'])->name('user.signin');
        Route::post('/signin',[UserController::class,'postSignIn'])->name('user.signin');
    });

    Route::group(['middleware'],function(){
        Route::get('/profile',[UserController::class,'getProfile'])->name('user.profile');
        Route::get('/logout',[UserController::class,'getLogout'])->name('user.logout');
    });
});
