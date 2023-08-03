<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::view('/', 'index');

Route::get('/employees', [EmployeeController::class, 'getAllEmployees']);
Route::post('/employees', [EmployeeController::class, 'saveEmployee']);
Route::get('/employees/deleted', [EmployeeController::class, 'getDeletedEmployees']);
Route::get('/employees/{id}/restore', [EmployeeController::class, 'restoreEmployee']);
Route::delete('/employees/{id}/force', [EmployeeController::class, 'forceDeleteEmployee']);
Route::get('/employees/add', [EmployeeController::class, 'showEmployeeAddForm'])->name('addEmployeeName');
Route::get('/employees/{id}', [EmployeeController::class, 'getEmployeeDetails']);
Route::delete('/employees/{id}', [EmployeeController::class, 'deleteEmployee']);

