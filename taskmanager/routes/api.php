<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('projects')->group(function() {
  Route::get('/', 'ProjectController@index');
  Route::post('/', 'ProjectController@store');
  Route::get('{id}', 'ProjectController@show');
  Route::put('{project}', 'ProjectController@markAsCompleted');
});

Route::prefix('tasks')->group(function() {
  Route::post('/', 'TaskController@store');
  Route::put('{task}', 'TaskController@markAsCompleted');
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Resource Not Found.'], 404);
});
