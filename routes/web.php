<?php

use App\Http\Controllers\CategoryController;
use App\Http\Middleware\LocaleMiddleware;
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

Route::prefix('category')->group(function () {
    Route::get('/{locale}', [CategoryController::class, 'index'])
        ->middleware(LocaleMiddleware::class)
        ->name('category.index');
    Route::put('/', [CategoryController::class, 'update'])->name('category.update');
});
