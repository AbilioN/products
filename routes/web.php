<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' , [IndexController::class , 'index']);
Route::get('clients' , [ClientController::class , 'show'])->name('clients.show');
Route::get('clients/view' , [ClientController::class , 'createView'])->name('clients.create.form');
Route::get('clients/edit/{clientId}' ,[ClientController::class , 'editView'])->name('clients.edit.form');
// get no delete apenas pra ser mais rapido
Route::get('clients/delete/{clientId}' ,[ClientController::class , 'delete'])->name('clients.delete');

Route::post('/clients/create' , [ClientController::class , 'create'])->name('clients.create');
Route::post('products/create' , [ProductController::class , 'create'])->name('products.create');