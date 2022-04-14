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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'foods'],function(){
    Route::get('', [FoodController::class, 'index'])->name('manager.foods');
    Route::get('create',[FoodController::class, 'create'])->name('manager.foods.create');
    Route::post('store',[FoodController::class, 'store'])->name('manager.foods.store');
    Route::get('{food}/edit',[FoodController::class, 'edit'])->name('manager.foods.edit');
    Route::post('{food}/update',[FoodController::class, 'update'])->name('manager.foods.update');
    Route::post('{food}/delete',[FoodController::class, 'delete'])->name('manager.foods.delete');
});
