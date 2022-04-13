<?php

use App\Http\Controllers\Dashboard\CategoryController;
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


//CRUD for Category
Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('manager.category');
    Route::get('/create', [CategoryController::class, 'create'])->name('manager.category.create');
    Route::get('/store', [CategoryController::class, 'store'])->name('manager.category.store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('manager.category.edit');
    Route::get('/{category}/update', [CategoryController::class, 'update'])->name('manager.category.update');
    Route::get('/{category}/delete', [CategoryController::class, 'delete'])->name('manager.category.delete');
});