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

Route::apiResource('/user_detail','Api\UserDetailController');

Route::apiResource('/calculated_salary','Api\CalculatedSalController');

Route::apiResource('/sal_group','Api\SalaryGrpController');

Route::apiResource('/api_admins','Api\AllAdminController');

Route::apiResource('/event','Api\CalenderController');

Route::get('/user/image','Api\UserDetailController@getProfilePic');

Route::post('/user/update_image','Api\UserDetailController@updateProfilePic');

/*
Personal access client created successfully.
Client ID: 1
Client secret: ufhgrCQkt5VP1OrD1FiZHTuH1uJx9Q0h7dcYJ1Il
Password grant client created successfully.
Client ID: 2
Client secret: nTgFIbDBD7Xbko7njne93wYRmOOOVAvCfVPfRlOC

*/ 