<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';

Route::view('/', 'index');


Route::get('/users', function(){
    $users = \App\Models\User::with('projects')->get();
    return $users;
});

Route::prefix('employees')->group(function () {
    Route::get('', [EmployeeController::class, 'getAllEmployees']);
    Route::post('', [EmployeeController::class, 'saveEmployee']);
    Route::put('/{id}', [EmployeeController::class, 'updateEmployee']);
    Route::get('/deleted', [EmployeeController::class, 'getDeletedEmployees']);
    Route::get('/{id}/restore', [EmployeeController::class, 'restoreEmployee']);
    Route::delete('/{id}/force', [EmployeeController::class, 'forceDeleteEmployee']);
    Route::get('/{id}/edit', [EmployeeController::class, 'showEmployeeEditForm']);
    Route::get('/add', [EmployeeController::class, 'showEmployeeAddForm'])->name('addEmployeeName');
    Route::get('/{id}', [EmployeeController::class, 'getEmployeeDetails']);
    Route::delete('/{id}', [EmployeeController::class, 'deleteEmployee']);
});


Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'getAllProjects']);
    Route::post('/', [ProjectController::class, 'saveProjects']);
    Route::put('/{id}', [ProjectController::class, 'updateProjects']);
    Route::get('/deleted', [ProjectController::class, 'getDeletedProjects']);
    Route::get('/{id}/restore', [ProjectController::class, 'restoreProjects']);
    Route::delete('/{id}/force', [ProjectController::class, 'forceDeleteProjects']);
    Route::get('/{id}/edit', [ProjectController::class, 'showProjectsEditForm']);
    Route::get('/add', [ProjectController::class, 'showProjectAddForm'])->name('addProjectName')->middleware('auth');
    Route::get('/{id}', [ProjectController::class, 'getProjectDetails']);
    Route::delete('/{id}', [ProjectController::class, 'deleteProject']);
});



Route::get('/students', [StudentController::class, 'getallstudents']);
Route::post('/students', [StudentController::class, 'savestudents']);
Route::get('/students/deleted', [StudentController::class, 'getdeletedstudents']);
Route::get('/students/{id}/restore', [StudentController::class, 'restorestudents']);
Route::delete('/students/{id}/force', [StudentController::class, 'forcedeletestudents']);
Route::get('/students/add', [StudentController::class, 'showstudentsaddform'])->name('addstudentname');
Route::get('/students/{id}', [StudentController::class, 'getstudentdetails']);
Route::delete('/students/{id}', [StudentController::class, 'deletestudent']);
