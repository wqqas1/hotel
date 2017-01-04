<?php

/*|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Route to display hotels.
Route::get('hotels', 'HotelsController@index');

//Display specific hotel.
Route::get('hotels/{hotel}', 'HotelsController@show');



Route::get('/', function () {
    return view('welcome');
});



//Added For Authentication

Auth::routes();

Route::get('/home', 'HomeController@index');
