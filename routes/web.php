<?php

use App\Lib\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $pageTitle = 'Home page';
    return view('home', compact('pageTitle'));
})->name('home')->middleware(['palygame', 'gamestop']);

Route::namespace('App\Http\Controllers')->middleware('gamestop')->group(function () {
    Route::post('/add-user', 'UserController@addUser')->name('adduser');
    Route::delete('/delete-cookie', 'UserController@delete')->name('delete.cookie');
    Route::get('/scarfform', 'siteController@scarfForm')->name('scarfform');
    Route::get('/tshirtform', 'siteController@tshirtForm')->name('tshirtform');
    Route::get('/ticketform', 'siteController@ticketForm')->name('ticketform');
    Route::post('/add-user', 'UserController@addUser')->name('adduser');
    Route::get('/scarf-form', 'siteController@scarfForm')->name('scarf-form');
    Route::get('/tshirt-form', 'siteController@tshirtForm')->name('tshirt-form');
    Route::post('/add-detail', 'UserController@addDetail')->name('add-detail');
      Route::get('/close', 'siteController@close')->name('close');
    // Apply middleware to routes requiring it
    Route::get('/playgame', 'UserController@playGame')->name('playgame')->middleware('palygamenot');
    Route::middleware('palygame')->group(function () {
        Route::get('/initial', 'siteController@initial')->name('initial');
        Route::get('/missed', 'siteController@missed')->name('missed');
        Route::get('/saved', 'siteController@saved')->name('saved');
        Route::get('/goal', 'siteController@goal')->name('goal');
    });
});

//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Cache facade value cleared</h1>';
});
