<?php

// Public Pages
Route::get('/', 'HomeController@index');
Route::get('public/movie/{id}', 'HomeController@show');


// Member Pages
Route::group(['prefix' => 'member'], function()
{
    Route::post('login', 'SessionController@memberLogin');
    Route::post('register', 'MemberController@register');
});


Route::group(['before' => 'auth', 'prefix' => 'member'], function()
{
    Route::get('/', 'MemberController@index');
    Route::get('logout', 'SessionController@memberLogout');
    Route::get('reserve/movie/{movieId}', 'MemberController@reserve');
    Route::get('ticket', 'MemberController@ticket');

    // AJAX
    Route::get('movie/{movieId}/{timeId}', 'MemberController@checkReserveSeats');
    Route::get('get-member-reserved-seats/{timeId}', 'MemberController@getReservedSeats');
    Route::post('save-reserved-seats', 'MemberController@saveReservedSeats');
});


// Admin Pages
Route::group(['prefix' => 'admin'], function()
{
    // Public
    Route::get('login', 'AdminController@index');
    Route::post('login', 'SessionController@adminLogin');
});

Route::group(['before' => 'admin', 'prefix' => 'admin'], function()
{
    Route::get('/', 'AdminController@index');
    Route::get('logout', 'AdminController@destroy');
    Route::post('save-reserved-seats', 'AdminController@saveReservedSeats');
    Route::get('movie/delete/{movieId}', 'AdminController@deleteMovie');

    // Admin AJAX
    Route::get('movie/{movieId}', 'AdminController@showMovie');
});

Route::group(['before' => 'auth|admin', 'prefix' => 'admin/dashboard'], function()
{
    Route::get('/', 'AdminController@dashboard');

    Route::get('movie', 'AdminController@movie');
    Route::get('add-movie-page', 'AdminController@addMoviePage');
    Route::post('add-movie', 'AdminController@addMovie');
    Route::get('delete/movie/{movieId}', 'AdminController@deleteMovie');
    Route::get('edit-movie-page/{movieId}', 'AdminController@editMovie');
    Route::get('member', 'AdminController@member');
    Route::get('seat', 'AdminController@seat');
    Route::post('reserved-seat', 'AdminController@reservedSeat');
    Route::get('cinema', 'AdminController@cinema');
    Route::get('manage-showtime/{cinemaId}', 'AdminController@manageShowtime');
    Route::get('transaction', 'AdminController@transaction');
    Route::get('ticket', 'AdminController@ticket');
    Route::get('cinema-add-showtime/{cinemaId}', 'AdminController@addShowTime');

    // ajax
    Route::get('get-movie-times/{cinemaId}', 'AdminController@getMovieTimesById');
    Route::get('get-admin-reserved-seats/{cinemaId}/{timeId}', 'AdminController@getReservedSeats');
    Route::get('get-all-transactions', 'AdminController@getAllTransactions');
});
