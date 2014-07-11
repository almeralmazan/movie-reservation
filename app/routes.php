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

    // AJAX
    Route::get('movie/{movieId}/{timeId}', 'MemberController@checkReserveSeats');
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
    Route::get('delete/{movieId}', 'AdminController@deleteMovie');
    Route::get('edit-movie-page/{movieId}', 'AdminController@editMovie');
    Route::get('member', 'AdminController@member');
    Route::get('seat', 'AdminController@seat');
    Route::get('cinema', 'AdminController@cinema');
    Route::get('cinema-add-showtime/{cinemaId}', 'AdminController@addShowTime');
});