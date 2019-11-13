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

Route::apiResource('/funds','Api\ShowFundController');

Route::get('/user/image','Api\UserDetailController@getProfilePic');

Route::post('/user/update_image','Api\UserDetailController@updateProfilePic');

/*
Personal access client created successfully.
Client ID: 1
Client secret: gVCgFb93AFt23qZO3GA6CRCokYNpYTXnu8xlH06p
Password grant client created successfully.
Client ID: 2
Client secret: kSAtzf1dx6zsDNhUUFURE2nZw2GPKDYWVZMdHzH5

*/
