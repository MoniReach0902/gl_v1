<?php

use App\Http\Controllers\ApiControllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Location;
use App\Models\User;

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
Route::get('/internet', function () {
    return response()->json([
        'status'  => true
    ]);
});

Route::get('/gettranslate', function () {

    $lang = \Request::get("lang") ?? 'en';
    \App::setLocale($lang);
    return response()->json([
        'dev'  => __('dev'),
        'appconfig'  => config('me.app'),
        // 'koboconfig'  => config('me.kobo'),
    ]);
});

Route::get('/location', function () {
    $lang = \Request::get("lang") ?? 'en';
    $location = new Location;
    $location_data = $location->selectRaw("*," . getJsonColumn('title', $lang) . "as title")->get()->toArray();
    return response()->json(
        [
            'obj_info' => '',
            'location' => $location_data
        ]
    );
});

Route::get('/checkuserauth', function () {
    $token = \Request::get("token") ?? '';
    $user = new User;
    $user_data = $user->selectRaw("id, name")
        ->where('api_token', $token)
        ->where('userstatus', 'yes')
        ->where('trash', '<>', 'yes')
        ->get()->toArray();

    return response()->json(
        $user_data
    );
});

Route::post('/register', ['uses' => 'App\Http\Controllers\Auth\RegisterController@register']);
Route::post('/login', ['uses' => 'App\Http\Controllers\UserAccessController@apiAuth']);




Route::any('{controller}/{method?}/{id?}', ['uses' => 'App\Http\Controllers\UserAccessController@index'])
    ->where(['id' => '[0-9]+', 'controller' => '[0-9a-z]+', 'method' => '[_a-z]+'])->name('mobile.controller');


// Route::group(['middleware' => ['auth:sanctum']], function () {

//     // Route::get('/user', function (Request $request) {
//     //     return $request->user();
//     // });

//     Route::any('{controller}/{method?}/{id?}', ['uses' => 'App\Http\Controllers\UserAccessController@index'])
//         ->where(['id' => '[0-9]+', 'controller' => '[0-9a-z]+', 'method' => '[_a-z]+'])->name('mobile.controller');
// });
