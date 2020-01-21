<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
    return redirect('/dashboard');
});


Auth::routes();



Route::post('/register','UserController@register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');



    //dashboard
    Route::resource('/dashboard','DashBoardController');


    //user
    Route::resource('/user','UserController');
    Route::get('/system-user','UserController@system_user');
    Route::get('/organizer','UserController@organizer');
    Route::get('/participant','UserController@participant');


    //category
    Route::resource('/category','CategoryController');
    //category distance
    Route::get('/cat-distance/{category_id}','CategoryDistanceController@index');
    //add distance
    Route::get('/distance-create/{category_id}','CategoryDistanceController@create');
    Route::post('/distance-store','CategoryDistanceController@store');

    //event
    Route::resource('/event','EventController');
    //show event participant in admin side
    Route::get('/event-paricipant/{event_id}-{cat_distance_id}','EventController@event_participant');
        //todays event. carbow now
    Route::get('/event-today','EventTodayController@index');

    //update the participant status during the day of the event to paid
    Route::get('/confirm/{id}','EventController@confirm');



    //1 event category
    Route::get('/event-category/{event_id}','EventCategoryController@index');
    //2 insert data to event_categories table
    Route::post('/event-category-store','EventCategoryController@store');
    //3 after saving it to event_categories , go to the index of cat distane
    Route::get('/event-category-distance/{event_category_id}','EventCategoryDistanceFeeController@index');
    //4 store it to table event_categories_distance_fee
    Route::post('/event-category-distance/store','EventCategoryDistanceFeeController@store');



    //for the participants
    Route::get('event-details/{event_id}','ParticipantController@index');

    //join a category store in db
    Route::post('/join','ParticipantController@join');

    //participant joined category
    Route::get('/participant-join-event','ParticipantController@active_listing');




    //report index
    Route::get('/report','ReportController@index');

    //result report
    Route::get('report-event/{event_id}','ReportController@result');



    //walk in
    Route::resource('walkin','WalkInController');
    //select a cat
    Route::post('walkin-select-category','WalkInController@select');


    Route::post('walkin-save','WalkInController@save');

});
