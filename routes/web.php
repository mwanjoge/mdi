<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\EmployeeControlle;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WorkplaceController;
use App\Http\Controllers\WorplaceCheckupController;
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
Route::post('workplace/checkup/submit',[WorplaceCheckupController::class,'submit'])->name('workplace.checkup.submit');
Route::get('test/case',[WorkplaceController::class,'testCase'])->name('test.case');
Route::get('workplace/report/{id}',[WorkplaceController::class,'reportLater'])->name('workplace.report');
Route::get('workplace/results/{id}',[WorkplaceController::class,'report'])->name('workplace.report');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('app.logout');
Route::resource('employee',EmployeeControlle::class);
Route::get('employee/results/{id}/{workplaceCheckup}',[EmployeeControlle::class,'results'])->name('employee.results');
Route::resource('workplace',WorkplaceController::class);
Route::get('workplace/{id}/{checkup?}',[WorkplaceController::class, 'getWorkplaceCheckup'])->name('workplace.show');
Route::resource('checkup',CheckupController::class);
Route::resource('bill',BillController::class);
Route::post('workplace/checkup',[CheckupController::class,'workplaceCheckup'])->name('workplace.checkup');
Route::get('results/toggle/{id}',[CheckupController::class,'toggleResults'])->name('results.toggle');
Route::get('checkup/status/{id}/{status}',[CheckupController::class,'updateStatus'])->name('checkup.status');
Route::get('report/results/{id}/{results}',[CheckupController::class,'updateResults'])->name('checkup.results');
Route::post('employee/upload',[EmployeeControlle::class,'upload'])->name('employee.upload');
Route::get('settings',[SettingsController::class,'index'])->name('settings.index');
Route::get('disease/delete/{id}',[SettingsController::class,'diseaseDelete'])->name('disease.delete');
Route::get('category/delete/{id}',[SettingsController::class,'categoryDelete'])->name('category.delete');
Route::post('disease/store',[SettingsController::class,'diseaseStore'])->name('disease.store');
Route::post('category/store',[SettingsController::class,'categoryStore'])->name('category.store');
