<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [UserController::class, 'create'])->name('user.craete');

Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::get('/user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->where('id', '[0-9]+');

Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

Route::delete('/user/destory', [UserController::class, 'destory'])->name('user.destroy');

Route::fallback(function(){
    return redirect('/');
});