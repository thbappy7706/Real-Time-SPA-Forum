<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\QuestionController;
use \App\Http\Controllers\Api\CategoryController;
use \App\Http\Controllers\Api\ReplyController;
use \App\Http\Controllers\Api\LikeController;

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
Route::post('like/{reply}',[LikeController::class,'likeIt' ]);
Route::delete('like/{reply}',[LikeController::class,'unLikeIt' ]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
