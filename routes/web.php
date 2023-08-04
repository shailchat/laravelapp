<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;

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
Route::view('/index1', 'index1');
Route::view('/index2', 'index2');

Route::get('/employees', [EmployeeController::class, 'getAllEmployees']);
Route::post('/employees', [EmployeeController::class, 'saveEmployee']);
Route::put('/employees/{id}', [EmployeeController::class, 'updateEmployee']);
Route::get('/employees/deleted', [EmployeeController::class, 'getDeletedEmployees']);
Route::get('/employees/{id}/restore', [EmployeeController::class, 'restoreEmployee']);
Route::delete('/employees/{id}/force', [EmployeeController::class, 'forceDeleteEmployee']);
Route::get('/employees/{id}/edit', [EmployeeController::class, 'showEmployeeEditForm']);
Route::get('/employees/add', [EmployeeController::class, 'showEmployeeAddForm'])->name('addEmployeeName');
Route::get('/employees/{id}', [EmployeeController::class, 'getEmployeeDetails']);
Route::delete('/employees/{id}', [EmployeeController::class, 'deleteEmployee']);

Route::get('/students', [StudentController::class, 'getallstudents']);
Route::post('/students', [StudentController::class, 'savestudents']);
Route::get('/students/deleted', [StudentController::class, 'getdeletedstudents']);
Route::get('/students/{id}/restore', [StudentController::class, 'restorestudents']);
Route::delete('/students/{id}/force', [StudentController::class, 'forcedeletestudents']);
Route::get('/students/add', [StudentController::class, 'showstudentsaddform'])->name('addstudentname');
Route::get('/students/{id}', [StudentController::class, 'getstudentdetails']);
Route::delete('/students/{id}', [StudentController::class, 'deletestudent']);
