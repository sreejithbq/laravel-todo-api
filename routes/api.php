<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::get('/', function (Request $request) {
    return 'Welcome To ToDo App';
});

//Auth
Route::prefix('auth')->as('auth.')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
    // Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    // Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
});

//User
// Route::middleware('auth:sanctum')->prefix('user')->as('user.')->group(function () {
//     Route::get('/', function (Request $request) {
//         return $request->user();
//     });
//     // Route::patch('/', [TaskController::class, 'update'])->name('update');
//     // Route::patch('/change-password', [TaskController::class, 'change-password'])->name('change-password');
// });

//Tasks
Route::middleware('auth:sanctum')->prefix('task')->as('task.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::post('/', [TaskController::class, 'store'])->name('store');
    Route::get('/{task}', [TaskController::class, 'show'])->name('show');
    Route::put('/{task}', [TaskController::class, 'update'])->name('update');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
});
