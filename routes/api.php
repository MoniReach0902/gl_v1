<?php

use App\Http\Controllers\ApiControllers\AuthController;
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

Route::get('/test', function () {
    return response()->json([
        'status'  => true
    ]);
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::any('{controller}/{method?}/{id?}', ['uses' => 'App\Http\Controllers\UserAccessController@index'])
    ->where(['id' => '[0-9]+', 'controller' => '[0-9a-z]+', 'method' => '[_a-z]+'])->name('api.controller');

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::any('{controller}/{method?}/{id?}', ['uses' => 'App\Http\Controllers\UserAccessController@index'])
//         ->where(['id' => '[0-9]+', 'controller' => '[0-9a-z]+', 'method' => '[_a-z]+'])->name('api.controller');

//     // Route::any('{controller}/{method?}/{id?}',['uses'=>'App\Http\Controllers\UserAccessController@index'])
//     // ->where(['id' => '[0-9]+', 'controller' => '[0-9a-z]+', 'method' => '[_a-z]+'])->name('api.controller');

// });
