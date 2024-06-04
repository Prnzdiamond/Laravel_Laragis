<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\myuser;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;


//Listing

// show all listings
Route::get('/',[ListingController::class, 'index']);
//show single listing
Route::get('/list/{list_id}', [ListingController::class,'show']);
// view form for job creation
Route::get('/listing/create',[ListingController::class, 'create'])->middleware('auth');
//create and store new job
Route::post('/listing',[ListingController::class,'store'])->middleware('auth');
//edit existing job
Route::get('/listing/{list_id}/edit', [ListingController::class,'edit'])->middleware('auth');
//update the edit made
Route::post('/listing/{list_id}/update',[ListingController::class,'update']);
//Delete a listing
Route::get('/listing/{list_id}/delete',[ListingController::class, 'destroy'])->middleware('auth');

//view Manage Page
Route::get('/listing/manage/{user_id}',[UserController::class,'manage']);

//User

//view Login_page
Route::get('/login_page',[UserController::class,'login_page'])->name('login')->middleware('guest');

// view Register_page
Route::get('/register_page',[UserController::class,'register_page'])->middleware('guest');

// create new user
Route::post('/user/create',[UserController::class,'store']);

//log user out
Route::get('/logout',[UserController::class,'logout']);


// log user in
Route::post('/user/login',[UserController::class,'login']);

// new comment for testing


// test

// Route::get('/tester',[UserController::class,'tester']);
