<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\AdminController;
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

Route::get('/', fn() => view('welcome'));

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::prefix('manager')->middleware('auth')->group(function () {
    Route::get('', fn() => view('template.dashboard'))->name('manager');

    /**
     * CRUD for admin
     */
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('manager.admin');
        Route::get('/create', [AdminController::class, 'create'])->name('manager.admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('manager.admin.store');
        Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('manager.admin.edit');
        Route::post('/{admin}/update', [AdminController::class, 'update'])->name('manager.admin.update');
        Route::post('/{admin}/delete', [AdminController::class, 'delete'])->name('manager.admin.delete');
    });
});

Route::group(['prefix'=>'foods'],function(){
    Route::get('', [FoodController::class, 'index'])->name('manager.foods');
    Route::get('create',[FoodController::class, 'create'])->name('manager.foods.create');
    Route::post('store',[FoodController::class, 'store'])->name('manager.foods.store');
    Route::get('{food}/edit',[FoodController::class, 'edit'])->name('manager.foods.edit');
    Route::post('{food}/update',[FoodController::class, 'update'])->name('manager.foods.update');
    Route::post('{food}/delete',[FoodController::class, 'delete'])->name('manager.foods.delete');
});
