<?php

use App\Http\Controllers\TaskController;
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

Route::get('todoApp', [TaskController::class, 'index']);
Route::post('store', [TaskController::class, 'store']);
Route::post('status/{id}', [TaskController::class, 'status']);
Route::put('update/{id}', [TaskController::class, 'update']);
Route::delete('destroy/{id}', [TaskController::class, 'destroy']);