<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'index'])->name('home.index');

Route::prefix('classes')->group(function(){
    Route::get('/', [ClassesController::class, 'index'])->name('class.index');
    Route::get('/add', [ClassesController::class, 'add'])->name('class.add');
    Route::post('/add', [ClassesController::class, 'store'])->name('class.store');
});