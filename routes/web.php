<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\LoginController;
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
   ->middleware('auth')
    ->group(function () {
        Route::match(['get', 'post'], 'profile', [ProfileController::class, 'update'])->name('updateProfile');
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
        Route::resource('/news',AdminNewsController::class)->except('show');
        Route::resource('/categories', AdminCategoryController::class)->except('show');
    });


Route::view('/about', 'about')->name('about');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('logout',[LoginController::class, 'logout']);

// Auth::routes();



