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
//list of events
Route::get('event-today','EventWinnerController@event_today');

//GETTING ALL THE EVENT CAT DISTANCE FEE RECORD THAT IS EQAUL TO THE EVENT ID
Route::get('/event-dis-cat-fee/{event_id}','EventWinnerController@event_cat');

//the ranking of winners by getting the event cat distance fee id because one of it is eqaul to one  cat distance
//and many participants can join it
Route::get('ranking/{id}','EventWinnerController@get_ranking');


Route::get('send/{par_no}','EventWinnerController@send');
Route::get('event','EventWinnerController@event_res');



Route::get('/system-user','UserController@system_user_api');
Route::get('/organizer','UserController@organizer_api');
Route::get('/participant','UserController@participant_api');
