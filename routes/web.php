<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/index',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::POST('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/status/{id}',[CategoryController::class,'status'])->name('status');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::POST('/update/{id}',[CategoryController::class,'update'])->name('update');
        Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('delete');
    });

