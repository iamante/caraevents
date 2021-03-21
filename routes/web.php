<?php

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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/termsconditions', 'PagesController@termsconditions');
Route::get('/privacypolicy', 'PagesController@privacypolicy');
Route::get('/gallery', 'GallerysController@index')->name('galleries.index');
Route::get('/clothing', 'ClothRentalsController@index');
Route::get('/clothing/{rentals}', 'ClothRentalsController@show')->name('clothrentals.show');
Route::get('/services', 'ServicesController@index')->name('services.index');
Route::get('/services/{service}', 'ServicesController@show')->name('services.show');
Route::get('/search', 'ServicesController@search')->name('search');

Route::get('/rental', 'RentalsController@index')->name('rental.index');

Route::get('/reservation', 'ReserveController@index')->name('reserve.home')->middleware(['auth' => 'auth_reservation']);
Route::get('/reservation/{service}', 'ReservationsController@index')->name('reserve.index')->middleware(['auth' => 'verified']);
Route::post('/reservation', 'ReservationsController@store')->name('reserve.store');

Route::get('/thankyou', 'ThankyouController@index')->name('thankyou.index');

Route::get('/blog', 'PagesController@blog');
Route::get('/contact', 'PagesController@contact');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/', ['uses' => 'Voyager\VoyagerController@index',   'as' => 'voyager.dashboard'])->middleware('auth_voyager_admin');
});

Route::get('login/{website}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{website}/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware('auth')->group(function () {
    Route::get('/user-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('user-profile', 'UsersController@update')->name('users.update');
    Route::get('/my-reservation', 'ReservesController@index')->name('reservation.index');
    Route::get('/my-reservation/{id}', 'ReservesController@show')->name('reservation.show');
});
