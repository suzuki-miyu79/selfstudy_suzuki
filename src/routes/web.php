<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/admin', [AdminController::class, 'search'])->name('admin.Results.search');
Route::get('/admin/showAllResults', 'AdminConrtoller@showAllResults')->name('admin.showAllResults');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
