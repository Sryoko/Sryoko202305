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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    // 一覧
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('index');
    Route::get('/category/{id}', [App\Http\Controllers\ItemController::class, 'category'])->name('category');
    Route::get('/create', [App\Http\Controllers\ItemController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\ItemController::class, 'store'])->name('store');
    Route::get('/show/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('show');
    Route::post('/order/{id}', [App\Http\Controllers\ItemController::class, 'order'])->name('order');
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('update');
    Route::get('/complete/{id}', [App\Http\Controllers\ItemController::class, 'complete'])->name('complete');
    Route::post('/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('destroy');
});
