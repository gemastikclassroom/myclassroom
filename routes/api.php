<?php

use App\Http\Controllers\Group\GroupController;
use App\Http\Controllers\Group\MemberController;
use App\Http\Controllers\Group\PostController;
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

Route::get('groups', [GroupController::class, 'index']);
Route::post('groups', [GroupController::class, 'create']);
Route::get('groups/{id}', [GroupController::class, 'findById']);
Route::post('groups/members', [MemberController::class, 'add']);
Route::post('groups/posts', [PostController::class, 'create']);
Route::get('groups/posts/{id}', [PostController::class, 'findAllPost']);
Route::get('groups/posts/{group_id}/{post_id}', [PostController::class, 'findPost']);

