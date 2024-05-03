<?php
use App\Lib\Router;
use Illuminate\Support\Facades\Route;




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
    return view('home');
});
Route::namespace('App\Http\Controllers')->group(function () {
	Route::post('/add-user', 'UserController@addUser')->name('adduser');
	Route::get('/play-game', 'UserController@playGame')->name('playgame');
});

/*Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');

Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create'])->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->name('login');
	Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->name('change.perform');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('users', UserController::class);
    Route::resource('prizes', PrizeController::class);
	Route::resource('live-prizes', LivePrizeController::class);
	Route::resource('prize-user', PrizeUserController::class);
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);
});*/

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

//Reoptimized class loader:
Route::get('/optimize', function() {
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    return '<h1>Clear Config cleared</h1>';
});
	// Route::get('/users', [UserController::class, 'index'])->name('users');
	// Route::get('/prizes', [PrizeController::class, 'index'])->name('prizes.index');