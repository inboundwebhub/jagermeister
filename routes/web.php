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
    return view('home',compact('pageTitle'));
})->name('home')->middleware('palygame');
Route::namespace('App\Http\Controllers')->group(function () {
	Route::post('/add-user', 'UserController@addUser')->name('adduser');
	Route::get('/playgame', 'UserController@playGame')->name('playgame')->middleware('palygamenot');
    // Route::resource('/game', 'siteController')->only(['index', 'update', 'edit', 'destroy']);
    Route::delete('/delete-cookie', 'UserController@delete')->name('delete.cookie');
    Route::get('/initial', 'siteController@initial')->name('initial')->middleware('palygame');
    Route::get('/missed', 'siteController@missed')->name('missed')->middleware('palygame');
    Route::get('/saved', 'siteController@saved')->name('saved')->middleware('palygame');
    Route::get('/goal', 'siteController@goal')->name('goal')->middleware('palygame');
});




//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Cache facade value cleared</h1>';
});

