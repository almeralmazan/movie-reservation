<?php

// Public Pages
Route::get('/', 'HomeController@index');
Route::get('/public/movie/{id}', 'HomeController@show');


// Member Pages
Route::group(['prefix' => 'member'], function()
{
    // GET
    Route::post('login', 'MemberController@store');
    Route::post('signup', 'MemberController@create');
});

Route::group(['before' => 'auth', 'prefix' => 'member'], function()
{
    Route::get('/', 'MemberController@index');
    Route::get('logout', 'MemberController@destroy');
    Route::get('reserve/movie/{movieId}', 'MemberController@reserve');

    // AJAX
    Route::get('movie/{movieId}/{timeId}', 'MemberController@checkReserveSeats');
    Route::post('save-reserved-seats', 'MemberController@saveReservedSeats');
});


// Admin Pages
Route::group(['prefix' => 'admin'], function()
{
    // Public
    Route::post('login', 'AdminController@store');
});

Route::group(['before' => 'auth|admin', 'prefix' => 'admin'], function()
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
    Route::get('reserve', 'AdminController@reserve');
    Route::get('view-add-movie', 'AdminController@viewAddMovie');
    Route::post('add-movie', 'AdminController@addMovie');
    Route::get('transaction', 'AdminController@transaction');
    Route::get('all-movies', 'AdminController@getAllMovies');
});