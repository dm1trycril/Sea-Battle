<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;

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

Route::get('/makeshot', [RoomController::class, 'MakeShot']);

Route::post('/register', [UserController::class, 'Register']);
Route::post('/login', [UserController::class, 'Login']);

Route::post('/room/create', [RoomController::class, 'CreateRoom']);
Route::post('/room/ready', [RoomController::class, 'UserReady']);
Route::post('/room/join', [RoomController::class, 'UserJoin']);