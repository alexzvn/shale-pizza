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
    Route::get('', [FoodConTroller::class, 'index'])->name('manager.foods');
    Route::get('create',[FoodConTroller::class, 'create'])->name('manager.foods.create');
    Route::post('store',[FoodConTroller::class, 'store'])->name('manager.foods.store');
    Route::get('{food}/edit',[FoodConTroller::class, 'edit'])->name('manager.foods.edit');
    Route::post('{food}/update',[FoodConTroller::class, 'update'])->name('manager.foods.update');
    Route::delete('{food}/delete',[FoodConTroller::class, 'delete'])->name('manager.foods.delete');
});
