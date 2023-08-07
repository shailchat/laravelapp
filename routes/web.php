<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-only', function(){
    return "welcome to dashboard";
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('/', 'index');
Route::view('/index1', 'index1');
Route::view('/index2', 'index2');

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

Route::get('/students', [StudentController::class, 'getallstudents']);
Route::post('/students', [StudentController::class, 'savestudents']);
Route::get('/students/deleted', [StudentController::class, 'getdeletedstudents']);
Route::get('/students/{id}/restore', [StudentController::class, 'restorestudents']);
Route::delete('/students/{id}/force', [StudentController::class, 'forcedeletestudents']);
Route::get('/students/add', [StudentController::class, 'showstudentsaddform'])->name('addstudentname');
Route::get('/students/{id}', [StudentController::class, 'getstudentdetails']);
Route::delete('/students/{id}', [StudentController::class, 'deletestudent']);
