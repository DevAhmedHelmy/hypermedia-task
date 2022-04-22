<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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
// Route::redirect('/','/login');
Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/', [\App\Http\Controllers\User\HomeController::class,'index'])->name('home');
    Route::get('/products/search', [\App\Http\Controllers\User\ProductController::class,'search'])->name('products.search');
    Route::get('/products', [\App\Http\Controllers\User\ProductController::class,'index'])->name('products');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'admin']
], function () {

    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
});
require __DIR__.'/auth.php';
