<?php

use App\Http\Controllers\BusinessUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sitemap', function () {
    return response()->view('sitemap')
        ->header('Content-Type', 'xml');
});

Route::prefix('/{locale}/')->middleware('language')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::get('/', function () {
    return redirect('/en');
});

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Authentication Routes...
Route::prefix('/{locale}/')->middleware('language')->group(function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');
    Route::get('/register/business', 'BusinessRegisterController@index')
        ->name('business-register');
    Route::post('/register/business', 'BusinessRegisterController@register')
        ->name('business-register');

    Route::post('register', 'Auth\RegisterController@register');

    Route::name('jobs.')->group(function () {
        Route::middleware(['auth', 'isBusinessUser'])->group(function () {
            Route::get('/jobs/new', 'JobsController@create')->name('create');
            Route::post('/jobs/store', 'JobsController@store')->name('store');
        });

        Route::middleware('removeEmptyQueryParam')
            ->get('/jobs', 'JobsController@index')
            ->name('index');
    });

    Route::name('users.')->middleware('auth')->group(function () {
        Route::get('/account', 'DefaultUserController@show')
            ->middleware('isNotBusinessUser')
            ->name('default-user-profile');

        Route::delete("/account", 'DefaultUserController@destroy')
            ->middleware('isNotBusinessUser')
            ->name('delete-default-user');

        Route::get('/business', [BusinessUserController::class, 'index'])
            ->middleware('isBusinessUser')
            ->name('business-user-profile');

        Route::get('/business/edit', 'BusinessUserController@edit')
            ->middleware('isBusinessUser')
            ->name('business.edit');

        Route::delete('/business', 'BusinessUserController@destroy')
            ->middleware('isBusinessUser')
            ->name('business.destroy');

    });
});

Route::post('jobs/{job}/apply', 'ApplyToJobController@store')->name('apply-to-job');
Route::delete('jobs/{job}/apply', 'ApplyToJobController@destroy')->name('remove-job-application');
Route::delete('jobs/{job}/favorite', 'FavoriteJobsController@destroy')->name("favorites.destroy");
Route::delete('/jobs/{job}', 'JobsController@destroy')->name('jobs.destroy')->middleware('can:publish-jobs');

Route::put('/jobs/{job}/close', "CloseJobController@update")->name('close')->middleware(['isBusinessUser', 'can:update-job']);

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


