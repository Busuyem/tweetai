<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutobotController;
use App\Http\Controllers\PostController;

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

Route::get('autobots', [AutobotController::class, 'index']);
Route::get('autobots/{autobot}', [AutobotController::class, 'show']);
Route::get('autobots/{autobot}/posts', [AutobotController::class, 'posts']);
Route::get('posts/{post}', [PostController::class, 'show']);
Route::get('posts/{post}/comments', [PostController::class, 'comments']);

Route::get('/autobots/count', [AutobotController::class, 'autobotCount']);
