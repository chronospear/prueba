<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\TaskController; 
use App\Http\Controllers\LogController;
use App\Http\Controllers\SellerController;  

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
    return view('auth.login');
});


Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('tareas/{tarea}/logadd', [App\Http\Controllers\TaskController::class, 'logadd'])->name('logadd');
    Route::resource('tareas', TaskController::class);
    Route::resource('logs', LogController::class);
    Route::resource('productos', ProductController::class);
    Route::resource('facturas', InvoiceController::class);
    Route::resource('vendedores', SellerController::class);
    Route::get('info', function () {
        return view('info.jetstream');
    });
});
