<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\FoodController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('detail/{id}', [HomeController::class,'show'])->name('detail');
Route::get('contact', [HomeController::class,'contact'])->name('contact');
Route::get('gallery', [HomeController::class,'gallery'])->name('gallery');
Route::get('download', [HomeController::class,'download'])->name('download');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::prefix('manager')->middleware('auth.admin')->group(function () {
    Route::get('', fn() => view('template.dashboard'))->name('manager');
  
    /**
     * CRUD for Food
     */
    Route::group(['prefix'=>'foods'],function(){    
        Route::get('', [FoodController::class, 'index'])->name('manager.foods');
        Route::get('create',[FoodController::class, 'create'])->name('manager.foods.create');
        Route::post('store',[FoodController::class, 'store'])->name('manager.foods.store');
        Route::get('{food}/edit',[FoodController::class, 'edit'])->name('manager.foods.edit');
        Route::post('{food}/update',[FoodController::class, 'update'])->name('manager.foods.update');
        Route::post('{food}/delete',[FoodController::class, 'delete'])->name('manager.foods.delete');
    });

    //CRUD for Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('manager.category');
        Route::get('/create', [CategoryController::class, 'create'])->name('manager.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('manager.category.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('manager.category.edit');
        Route::get('/{category}/destroy', [CategoryController::class, 'destroy'])->name('manager.category.destroy');
        Route::post('/{category}/update', [CategoryController::class, 'update'])->name('manager.category.update');
        Route::post('/{category}/delete', [CategoryController::class, 'delete'])->name('manager.category.delete');
    });

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

    //RUD for customer
    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', [CustomerController::class, 'index'])->name('manager.customer');
        Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('manager.customer.edit');
        Route::post('/{customer}/update', [CustomerController::class, 'update'])->name('manager.customer.update');
        Route::post('/{customer}/delete', [CustomerController::class, 'delete'])->name('manager.customer.delete');
    });
});


