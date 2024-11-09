<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;

Route::get('/jobs', [apiController::class,'index'])->middleware('auth:api');
