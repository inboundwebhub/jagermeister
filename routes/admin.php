<?php

use Illuminate\Support\Facades\Route;
/*
Route::prefix('admin')->name('admin.')->group(function () {
	Route::controller('Admin\Auth\LoginController')->group(function () {
        Route::get('/', 'show')->name('login');
    });
*/

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
	Route::namespace('Auth')->group(function () {
		Route::get('/', 'LoginController@show')->name('login');
		Route::post('/login', 'LoginController@login')->name('login.perform');
		Route::post('logout', 'LoginController@logout')->name('logout');
		Route::get('/reset-password', 'ResetPassword@show')->name('reset-password');
		Route::post('/reset-password', 'ResetPassword@send')->name('reset.perform');
		Route::get('/change-password', 'ChangePassword@show')->name('change-password');
		Route::post('/change-password', 'ChangePassword@update')->name('change.perform');
	});
	Route::middleware(['admin'])->group(function () {
		Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');



		Route::resource('users', 'UserController');
		Route::resource('prizes', 'PrizeController');
		Route::post('/prizes-import', 'PrizeController@import')->name('prizes.import');
		Route::get('/prizes-export', 'PrizeController@export')->name('prizes.export');

		Route::resource('live-prizes', 'LivePrizeController');
		Route::resource('prize-user', 'PrizeUserController');

		Route::get('/virtual-reality', 'PageController@vr')->name('virtual-reality');
		Route::get('/rtl', 'PageController@rtl')->name('rtl');
		Route::get('/profile', 'UserProfileController@show')->name('profile');
		Route::post('/profile', 'UserProfileController@update')->name('profile.update');
		Route::get('/profile-static', 'PageController@profile')->name('profile-static');

		Route::get('/sign-in-static', 'PageController@signin')->name('sign-in-static');
		Route::get('/sign-up-static', 'PageController@signup')->name('sign-up-static');
		Route::get('/{page}', 'PageController@index')->name('page');
	});
});
