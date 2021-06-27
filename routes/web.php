<?php

use App\Http\Controllers\CheckupController;
use App\Http\Controllers\EmployeeControlle;
use App\Http\Controllers\SettingsController;
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
Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('app.logout');
Route::resource('employee',EmployeeControlle::class);
Route::resource('workplace',WorkplaceController::class);
Route::resource('checkup',CheckupController::class);
Route::post('workplace/checkup',[CheckupController::class,'workplaceCheckup'])->name('workplace.checkup');
Route::get('results/toggle/{id}',[CheckupController::class,'toggleResults'])->name('results.toggle');
Route::get('checkup/status/{id}/{status}',[CheckupController::class,'updateStatus'])->name('checkup.status');
Route::get('report/results/{id}/{results}',[CheckupController::class,'updateResults'])->name('checkup.results');
Route::post('employee/upload',[EmployeeControlle::class,'upload'])->name('employee.upload');
Route::get('workplace/report/{id}',[WorkplaceController::class,'report'])->name('workplace.report');
Route::get('settings',[SettingsController::class,'index'])->name('settings.index');
