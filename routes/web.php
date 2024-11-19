<?php
use App\http\Controllers\Front;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
function(){
        Route::get('home', [Front\MainController::class,'home'])->name('home');
        Route::get('about', [Front\MainController::class,'about'])->name('about');
        Route::get('articles', [Front\MainController::class,'articles'])->name('articles');
        Route::get('donation-requests', [Front\MainController::class,'donation_requests'])->name('donation_requests');
        Route::get('who are us', [Front\MainController::class,'who_are_us'])->name('who are us');
        Route::get('contact us', [Front\MainController::class,'contact_us'])->name('contact us');
        Route::get('inside', [Front\MainController::class,'inside'])->name('inside');
        Route::get('register', [Front\AuthController::class,'register'])->name('register');
        Route::get('login', [Front\AuthController::class,'login'])->name('login');
    });

// Route::get('/user', function () {
//     return view('front.home ');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









// Route::get('/', function () {
//     return view('front.home');

// });
// Route::get('clear', function () {
//     \Illuminate\Support\Facades\Artisan::call('config:cache');
//     \Illuminate\Support\Facades\Artisan::call('cache:clear');
// });
// Route::get('client-login', 'FrontController@login');
// Route::post('client-login', 'FrontController@loginPost');
// Route::get('client/logout', 'FrontController@logout');
// Route::get('sign-up', 'FrontController@register');
// Route::post('sign-up', 'FrontController@registerPost');

// Auth::routes();
// //Admin panel
// Route::group(['middleware' => ['auth', 'auto-check-permission'], 'prefix' => 'admin'], function () {

//     Route::get('home', 'HomeController@index')->name('home');
//     Route::resource('governorates', 'GovernorateController');
//     Route::resource('cities', 'CityController');
//     Route::resource('categories', 'CategoryController');
//     Route::resource('posts', 'PostController');
//     Route::resource('donations', 'DonationController');
//     Route::resource('contacts', 'ContactController');
//     Route::resource('reports', 'ReportController');
//     Route::get('clients-activate/{id}', 'ClientController@activate')->name('clients.activate');
//     Route::get('clients-deactivate/{id}', 'ClientController@deactivate')->name('clients.deactivate');
//     Route::get('clients-toggle-activation/{id}', 'ClientController@toggleActivation')->name('clients.toggle-activation');
//     Route::resource('clients', 'ClientController');
//     Route::resource('settings', 'SettingController');
//     Route::resource('user', 'UserController');
//     Route::resource('role', 'RoleController');
//     // User reset password
//     Route::get('user/change-password', 'UserController@changePassword');
//     Route::post('user/change-password', 'UserController@changePasswordSave');

// });
require __DIR__.'/auth.php';
