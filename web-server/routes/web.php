<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductController;
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



Route::group(['auth'], function() {
    Route::get('shopping', [DashboardController::class,'shopping'])->name('shopping');
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
});

Route::group(['middleware' => ['role:admin','auth'], 'prefix' => 'a', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class,'dashboard'])->name('dashboard');
    Route::get('knowledge', [AdminController::class,'knowledge'])->name('knowledge');
    Route::post('update-corpus', [AdminController::class,'update_corpus'])->name('corpus');
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-details', OrderDetailsController::class);
});

require __DIR__.'/auth.php';
