<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('notify')->group(function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('signUp', [UserController::class, 'register']);
    Route::get('users', [UserController::class, 'listUsers']);
    Route::post('getUser', [UserController::class, 'singleUser']);
});

Route::prefix('event')->group(function () {
    Route::post('addEvent', [EventController::class, 'addEvent']);
    Route::get('getEvents', [EventController::class, 'getEvents']);
    Route::get('latestEvent', [EventController::class, 'onGoingEvent']);
});
Route::prefix('admin')->group(function () 
{
    Route::post('register',[AdminController::class,'register']);
    Route::post('getAdmin',[AdminController::class,'check']);
});
