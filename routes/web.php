<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
// index - Show all tickets
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

// All Listings
Route::get('/', [PlanController::class, 'index']);



// Manage Tickets
Route::get('/tickets/show', [TicketController::class, 'show'])->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/tickets/manage', [TicketController::class, 'show'])->middleware('auth');
Route::get('/tickets/{token_body}', [TicketController::class, 'second_dash']);
Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/ticket/create/{token_body}', [TicketController::class, 'create']);
Route::post('/ticket/store/{token_body}', [TicketController::class, 'store']);
Route::get('/tickets/delete/{ticket_id}', [TicketController::class, 'delete']);
Route::get('/tickets/open/admin/{ticket_id}', [TicketController::class, 'showSupportChatbox']);
Route::get('/tickets/open/customer/{ticket_id}', [TicketController::class, 'showCustomerChatbox']);

