<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;

Route::get('/get-users', [\App\Http\Controllers\Api\User\UserController::class, 'getUsers']);
Route::post('/get-user-details', [\App\Http\Controllers\Api\User\UserController::class, 'getUserDetails']);
Route::post('/create-user', [\App\Http\Controllers\Api\User\UserController::class, 'updateOrCreate']);
Route::post('/delete-user', [\App\Http\Controllers\Api\User\UserController::class, 'deleteUser']);
