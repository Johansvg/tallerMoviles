<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ShiftController;

// Rutas del recurso departament
Route::get('/departaments', [DepartamentController::class, 'index']);
Route::post('/departaments', [DepartamentController::class, 'store']);
Route::get('/departaments/{id}', [DepartamentController::class, 'show']);
Route::put('/departaments/{id}', [DepartamentController::class, 'update']);
Route::delete('/departaments/{id}', [DepartamentController::class, 'destroy']);

// Rutas del recurso employe
Route::get('/employes', [EmployeController::class, 'index']);
Route::post('/employes', [EmployeController::class, 'store']);
Route::get('/employes/{id}', [EmployeController::class, 'show']);
Route::put('/employes/{id}', [EmployeController::class, 'update']);
Route::delete('/employes/{id}', [EmployeController::class, 'destroy']);

// Rutas del recurso position
Route::get('/positions', [PositionController::class, 'index']);
Route::post('/positions', [PositionController::class, 'store']);
Route::get('/positions/{id}', [PositionController::class, 'show']);
Route::put('/positions/{id}', [PositionController::class, 'update']);
Route::delete('/positions/{id}', [PositionController::class, 'destroy']);

// Rutas del recurso shift
Route::get('/shifts', [ShiftController::class, 'index']);
Route::post('/shifts', [ShiftController::class, 'store']);
Route::get('/shifts/{id}', [ShiftController::class, 'show']);
Route::put('/shifts/{id}', [ShiftController::class, 'update']);
Route::delete('/shifts/{id}', [ShiftController::class, 'destroy']);


