<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  


//all listings

Route::get('/', [ListingController::class, 'index']);

//Show create form
Route::get('/listings/create', 
[ListingController::class, 'create'])->middleware('auth');

//store listing data

Route::post('/listings', 
[ListingController::class, 'store'])->middleware('auth');

//show edit form

Route::get('/listings/{listing}/edit', 
[ListingController::class, 'edit'])->middleware('auth');

//Update Listing

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//single listing

Route::get('/listings/{listing}', 
[ListingController::class, 'show']);

//Show register/create form

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user

Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'] )->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

