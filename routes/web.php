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
//Delete a review.
Route::get('/reviews/{review}/destroy', 'ReviewsController@destroy');


Route::get('/', function () {
    return view('welcome');
});




//Show the New Hotel Page.
Route::get('partners/newhotel', function () {
    return view('partners.addhotel');
});

// Add a New Hotel.
Route::post('partners/hotels/add', 'HotelsController@store');



//Show all the hotels that a partner has listed
Route::get('partners/yourhotels', 'HotelsController@ShowHotelsByPartner');
// Edit a specific hotels details.
Route::get('yourhotels/edit/{hotel}', 'HotelsController@edit');
//Update a specific hotels details.
Route::patch('yourhotels/edit/{hotel}', 'HotelsController@update');
//Add a new Room to a hotel

Route::post('yourhotels/{hotel}/rooms', 'RoomsController@store');
// Edit a rooms

Route::get('/rooms/{room}/edit', 'RoomsController@edit');
// Update a room
Route::patch('/rooms/{room}/edit', 'RoomsController@update');

// Delete a room

Route::get('/rooms/{room}/destroy', 'RoomsController@destroy');




//Admins Routes
Route::get('partner/requests', 'ProposalController@show');

Route::get('/proposal/{proposal}/destroy', 'ProposalController@destroy');

Route::get('/proposal/{proposal}/accept', 'HomeController@update');

// User Routes

Route::get('partner/apply', 'ProposalController@index');
Route::get('partner/{user}/status', 'ProposalController@status');
Route::post('/proposal/{user}/new', 'ProposalController@store');
//Added For Authentication

Auth::routes();

Route::get('/home', 'HomeController@index');
