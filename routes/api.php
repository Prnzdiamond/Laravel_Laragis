<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;
use App\Http\Controllers\zohoController;

Route::get('/jobs', [apiController::class, 'index'])->middleware('auth:api');

Route::get('/getToken', [apiController::class, 'gettoken']);

Route::get('/callback', [apiController::class, 'getRefreshToken']);


Route::get('/token', [zohoController::class, 'contactsIndex']);

Route::get('/storeUser', [zohoController::class, 'contactStore']);


Route::post('/file', [zohoController::class, 'fileHandler']);

Route::get('/leads', [zohoController::class, 'leadsIndex']);

Route::get('/leadStore', [zohoController::class, 'leadStore']);
