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

Route::get('/search', function () {
    return view('search');
});


Route::post('/search', 'HotelsController@index');

//Show the New Hotel Page.

Route::get('partners/{partner}/newhotel', 'PartnerController@addHotel');
// Add a New Hotel.
Route::post('hotels/{partner}/add', 'HotelsController@store');



//Show all the hotels that a partner has listed
Route::get('partners/{partner}/yourhotels', 'HotelsController@ShowHotelsByPartner');
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


//add new photos
Route::get('{hotel}/photos', 'HotelPhotosController@uploadPhoto');
Route::post('{hotel}/photos', 'HotelPhotosController@addphoto');
//delete photo
Route::get('{hotel}/{hotelphoto}/destroy', 'HotelPhotosController@destroy');
// Delete a room

Route::get('/rooms/{room}/destroy', 'RoomsController@destroy');


//delete a hotel

Route::get('/yourhotels/destroy/{hotel}', 'HotelsController@destroy');
//Admins Routes
Route::get('partner/requests', 'ProposalController@show');

Route::get('/proposal/{proposal}/destroy', 'ProposalController@destroy');

Route::get('/proposal/{proposal}/accept', 'HomeController@update');

Route::get('partner/list', 'PartnerController@index');



Route::get('/partners/{partner}/destroy', 'PartnerController@destroy');

// User Routes

Route::get('partner/apply', 'ProposalController@index');
Route::get('partner/{user}/status', 'ProposalController@status');
Route::post('/proposal/{user}/new', 'ProposalController@store');




// Make a booking

Route::get('/book/{hotel}/{room}', 'ReservationController@index');

//confirm booking

Route::post('/bookings/new/{room}/{first}/{sec}/{protectedCost}', 'ReservationController@store');
//view Reservations
Route::get('/user/reservations', 'ReservationController@show');

//cancel booking
Route::get('reservations/{reservation}/cancel', 'ReservationController@destroy');
//Added For Authentication

Auth::routes();

Route::get('/home', 'HomeController@index');
