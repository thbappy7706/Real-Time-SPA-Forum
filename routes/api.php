<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\QuestionController;
use \App\Http\Controllers\Api\CategoryController;
use \App\Http\Controllers\Api\ReplyController;
use \App\Http\Controllers\Api\LikeController;
use \App\Http\Controllers\Api\AuthController;
use \App\Http\Controllers\Api\LogController;

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

Route::apiResource('question', QuestionController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('question/{question}/reply', ReplyController::class);
Route::post('reply/delete/{id}', [ReplyController::class,'customDelete']);
Route::post('like/{reply}', [LikeController::class, 'likeIt']);
Route::delete('like/{reply}', [LikeController::class, 'unLikeIt']);


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('signup', [AuthController::class, 'signup']);

});


Route::post('hit-count',LogController::class);
