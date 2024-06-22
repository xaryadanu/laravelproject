<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sparepartsController;
use App\Http\Middleware\sparepartsAdmin;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'spareparts_middleware'],function(){

    
    Route::get('/spareparts/create', [App\Http\Controllers\sparepartsController::class, 'create'])->name('spareparts.create');
    Route::get('/spareparts/index', [App\Http\Controllers\sparepartsController::class, 'index'])->name('spareparts.index');
    Route::post('/spareparts/store', [App\Http\Controllers\sparepartsController::class, 'store'])->name('spareparts.store');
    Route::get('/spareparts/{id}/edit', [App\Http\Controllers\sparepartsController::class, 'edit'])->name('spareparts.edit');
    Route::put('/spareparts/{id}/update', [App\Http\Controllers\sparepartsController::class, 'update'])->name('spareparts.update');
    Route::delete('/spareparts/{id}/delete', [App\Http\Controllers\sparepartsController::class, 'destroy'])->name('spareparts.delete');

});