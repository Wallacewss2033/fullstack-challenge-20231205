<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# expenses
Route::post('/expenses', [ExpenseController::class, 'store'])->middleware('auth:sanctum');
Route::get('/expenses', [ExpenseController::class, 'index'])->middleware('auth:sanctum');
Route::post('/expenses/{id}', [ExpenseController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->middleware('auth:sanctum');
Route::get('/expenses/{id}', [ExpenseController::class, 'show'])->middleware('auth:sanctum');
