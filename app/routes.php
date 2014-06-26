<?php

Route::get('/', 'HomeController@index');

// Member Page
Route::group(['before' => 'auth', 'prefix' => 'member'], function()
{
    Route::get('/', 'MemberController@index');
    Route::get('logout', 'MemberController@destroy');
    Route::get('reserve/movie/{movieId}', 'MemberController@reserve');
});

// Admin Pages
Route::group(['before' => 'auth|admin', 'prefix' => 'admin'], function()
{
    Route::get('logout', 'AdminController@destroy');
    Route::post('save-reserved-seats', 'AdminController@saveReservedSeats');
    Route::get('movie/delete/{movieId}', 'AdminController@deleteMovie');
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