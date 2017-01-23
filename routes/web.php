<?php

/*|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Homepage
Route::get('/', function () {
    return view('welcome');
})->name('HomePage');


// Advanced Search
Route::get('/search', function () {
    return view('search');
})->name('AdvancedSearch');






// Admin - Proposals -  Show , Accept, and decline Partner Proposals.

Route::get('/proposal/{proposal}/accept', 'HomeController@update');

Route::get('partner/requests', 'ProposalController@show');

Route::get('/proposal/{proposal}/decline', 'ProposalController@destroy');


//Admin - List all the partners on the website and remove them.
Route::get('partner/list', 'PartnerController@index');

Route::get('/partners/{partner}/remove', 'PartnerController@remove');

// Users - Make Partner Proposal and View Proposal status

Route::get('partner/apply', 'ProposalController@index');
Route::get('partner/{user}/status', 'ProposalController@status');
Route::post('/proposal/{user}/new', 'ProposalController@store');


//Partner - View a Hotels Reservations and Add a New Hotel.

Route::get('partners/{partner}/newhotel', 'PartnerController@addHotel');

Route::get('/viewreservations/{hotel}', 'PartnerController@HotelReservations');

Route::post('hotels/{partner}/add', 'HotelsController@store');



// Search for Hotels and Select a Hotel.

Route::post('/search', 'HotelsController@index');

Route::get('/guestsearch', 'HotelsController@guestview');

Route::get('hotels/{hotel}', 'HotelsController@show');






//Partner- Show All the Hotels by the Partner and upon selecting one load the hotels dashboard.
Route::get('partners/{partner}/yourhotels', 'HotelsController@ShowHotelsByPartner');

Route::get('/yourhotels/{hotel}/dashboard', 'HotelsController@ShowDash');


//Partner- Edit a Specific Hotels details /  delete the hotel.
Route::get('yourhotels/edit/{hotel}', 'HotelsController@edit');

Route::patch('yourhotels/edit/{hotel}', 'HotelsController@update');

Route::get('/yourhotels/destroy/{hotel}', 'HotelsController@destroy');

//Partner- Upload and Delete Photos for Hotels.
Route::get('{hotel}/photos', 'HotelPhotosController@uploadPhoto');
Route::post('{hotel}/photos', 'HotelPhotosController@addphoto');
Route::get('{hotel}/{hotelphoto}/destroy', 'HotelPhotosController@destroy');

//Partner - View Charts regarding the performance of the hotels.
Route::get('/partners/{partner}/graphs', 'ChartsController@index');


//Partner- Add a Room , Edit a Room Or Delete a room associated with a hotel.

Route::post('yourhotels/{hotel}/rooms', 'RoomsController@store');

Route::get('/rooms/{room}/edit', 'RoomsController@edit');

Route::patch('/rooms/{room}/edit', 'RoomsController@update');

Route::get('/rooms/{room}/discard', 'RoomsController@destroy');




//User- Post , Edit or Delete Reviews.
Route::post('hotels/{hotel}/reviews', 'ReviewsController@store');

Route::get('/reviews/{review}/edit', 'ReviewsController@edit');

Route::patch('reviews/{review}', 'ReviewsController@update');

Route::get('/reviews/{review}/destroyreview', 'ReviewsController@destroy');


//User- Book, Confirm , View and Cancel Bookings.

Route::get('/book/{hotel}/{room}', 'ReservationController@index');

Route::post('/bookings/new/{room}/{first}/{sec}/{protectedCost}', 'ReservationController@store');

Route::get('/user/reservations', 'ReservationController@show');

Route::get('reservations/{reservation}/cancel', 'ReservationController@destroy');


//User- Create the Users reservation into a printable pdf file.
Route::get('/reservations/{reservation}/pdf', 'ReservationController@pdfview');


//Added For Authentication

Auth::routes();

Route::get('/home', 'HomeController@index');
