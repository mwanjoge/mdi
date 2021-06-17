<?php

use App\Http\Controllers\CheckupController;
use App\Http\Controllers\EmployeeControlle;
use App\Http\Controllers\WorkplaceController;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('employee',EmployeeControlle::class);
Route::resource('workplace',WorkplaceController::class);
Route::resource('checkup',CheckupController::class);
Route::post('employee/upload',[EmployeeControlle::class,'upload'])->name('employee.upload');
