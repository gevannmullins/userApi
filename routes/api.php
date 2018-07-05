<?php
use App\User;
use App\Http\Resources\User as UserResource;
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


// Get user endpoint
Route::get('user/{id}', 'UserController@getUserById');
Route::post('user', 'UserController@getUserByToken');

Route::post('login', 'UserController@loginUser');
Route::post('register', 'UserController@registerUser');
