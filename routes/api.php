<?php

use App\Http\Controllers\Group\GroupController;
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
Route::post('groups/members', [GroupController::class, 'addMemberToGroup']);
Route::post('groups/posts', [GroupController::class, 'createNewPost']);
Route::get('groups/posts/{id}', [GroupController::class, 'findAllPost']);
Route::get('groups/posts/{group_id}/{post_id}', [GroupController::class, 'findPost']);

