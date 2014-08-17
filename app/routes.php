<?php

// Public Pages
Route::get('/', 'HomeController@index');
Route::get('public/movie/{id}', 'HomeController@show');

// Password Reset
Route::get('password-reset', 'RemindersController@index');
Route::post('password-reset', 'RemindersController@store');
Route::get('password/reset/{token}', 'RemindersController@show');
Route::post('password-update', 'RemindersController@update');

// Activate Account
Route::get('activate-account/{code}', 'MemberController@activateAccount');
Route::get('activate-message', 'MemberController@activateMessage');

// Member Pages
Route::group(['prefix' => 'member'], function()
{
    Route::post('login', 'SessionController@memberLogin');
    Route::post('register', 'MemberController@register');
    Route::get('profile', 'MemberController@memberProfile');
    Route::get('transaction', 'MemberController@memberTransaction');
    Route::post('update-account', 'MemberController@updateAccount');
    Route::post('change-password', 'MemberController@changePassword');
});


Route::group(['before' => 'auth', 'prefix' => 'member'], function()
{
    Route::get('/', 'MemberController@index');
    Route::get('logout', 'SessionController@memberLogout');
    Route::get('reserve/movie/{movieId}', 'MemberController@reserve');
    Route::get('success-page', 'MemberController@successPage');

    // AJAX
    Route::get('movie/{movieId}/{timeId}', 'MemberController@checkReserveSeats');
    Route::get('get-member-reserved-seats/{timeId}', 'MemberController@getReservedSeats');
    Route::post('save-reserved-seats', 'MemberController@saveReservedSeats');
    Route::post('deposit-amount', 'MemberController@depositAmount');

    // Payments
    Route::post('reserved-seat', 'MemberController@reservedSeat');
    Route::get('online-payment', 'PayPalController@buyWithPayPal');

    // email
    Route::get('receipt-ticket/{transactionId}', 'MemberController@receiptTicket');
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
    Route::post('update-movie/{movieId}', 'AdminController@updateMovie');
    Route::get('member', 'AdminController@member');
    Route::get('seat', 'AdminController@seat');
    Route::post('reserved-seat', 'AdminController@reservedSeat');
    Route::get('cinema', 'AdminController@cinema');
    Route::get('manage-showtime/{cinemaId}', 'AdminController@manageShowtime');
    Route::post('update/cinema', 'AdminController@updateCinema');
    Route::get('transaction', 'AdminController@transaction');
    Route::get('pay/transaction/{transactionId}', 'AdminController@payTransactionToBank');
    Route::get('delete/transaction/{transactionId}', 'AdminController@deleteTransaction');
    Route::get('ticket', 'AdminController@ticket');
    Route::get('cinema-add-showtime/{cinemaId}', 'AdminController@addShowTime');

    // ajax
    Route::get('get-all-members', 'AdminController@getAllMembers');
    Route::get('get-movie-times/{cinemaId}', 'AdminController@getMovieTimesById');
    Route::get('get-admin-reserved-seats/{cinemaId}/{timeId}', 'AdminController@getReservedSeats');
    Route::get('get-all-transactions', 'AdminController@getAllTransactions');

    // email
    Route::get('receipt-ticket/{transactionId}', 'AdminController@receiptTicket');
});
