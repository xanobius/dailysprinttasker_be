<?php

use App\Http\Controllers\SprintController;
use App\Http\Controllers\TaskController;
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

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user',  function (Request $request) {
        return $request->user();
    });

    Route::prefix('sprints')->group(function(){
        Route::get('/', [SprintController::class, 'index']);
    });

    Route::prefix('tasks')->group(function(){
        Route::get('/', [TaskController::class, 'index']);
    });
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
