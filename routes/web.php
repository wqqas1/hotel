<?php

/*|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Route to display hotels.
Route::get('hotels', 'HotelsController@index');

//Display specific hotel.
Route::get('hotels/{hotel}', 'HotelsController@show');
//post a reviews.
Route::post('hotels/{hotel}/reviews', 'ReviewsController@store');

//Edit a review.
Route::get('/reviews/{review}/edit', 'ReviewsController@edit');
Route::patch('reviews/{review}', 'ReviewsController@update');


Route::get('/', function () {
    return view('welcome');
});



//Added For Authentication

Auth::routes();

Route::get('/home', 'HomeController@index');
