<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/employees", [EmployeeController::class, 'getAllEmployees']);
Route::post("/employees", [EmployeeController::class, 'saveEmployee'])->middleware('auth:sanctum');
Route::get("/employees/{id}", [EmployeeController::class, 'getAllEmployeeById']);


Route::get('/todos', [\App\Http\Controllers\Api\TodoController::class, 'getTodos']);

Route::post('/tokens/create', function (Request $request) {

    $user = User::where('id', 9)->first();
    auth()->login($user);
    $token =  $user->createToken('token');
    return $token;
    return ['token' => $token->plainTextToken];
});
