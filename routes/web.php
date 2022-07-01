<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

Route::group(['auth'], function() {
    Route::get('shoping')->name('shoping');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'a', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class,'dashboard'])->name('dashboard');
    Route::get('products', [AdminController::class,'products'])->name('products');
    Route::get('orders', [AdminController::class,'orders'])->name('orders');
    Route::get('knowledge', [AdminController::class,'knowledge'])->name('knowledge');
});

require __DIR__.'/auth.php';
