<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('public', fn() => view('template.public'));
Route::get('dashboard', fn() => view('template.dashboard'));
Route::get('register', fn() => view('auth.register'));


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

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
