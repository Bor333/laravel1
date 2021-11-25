<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index'])->name('home');



Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{id}', [NewsController::class, 'show'])->name('show');
        Route::name('category.')
            ->group(function () {
                Route::get('categories/', [CategoryController::class, 'index'])->name('index');
                Route::get('categories/{slug}', [CategoryController::class, 'show'])->name('show');
            });
    });



Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
        Route::resource('/news',AdminNewsController::class)->except('show');
        Route::resource('/categories', AdminCategoryController::class)->except('show');
 /*       Route::get('/news/create', [AdminNewsController::class, 'create'])->name('news.create');
        Route::get('/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
        Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');
        Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');
 */
    });


Route::view('/about', 'about')->name('about');

Auth::routes();



