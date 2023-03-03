<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tokens',[TokenController::class,'getAllToken']);
Route::get('tokens/generate',[TokenController::class,'create']);
Route::get('tokens/get/{user_access_key}',[TokenController::class,'getToken']);
Route::get('chats/get/{ticket_id}',[ChatController::class,'getChats']);
Route::get('chats/store',[ChatController::class,'store']);
