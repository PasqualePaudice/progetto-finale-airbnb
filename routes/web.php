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

Route::get('/','PublicController@index')->name('publicHome');

Route::get('/dettagli/{apartment}', 'PublicController@dettagli')->name('dettagli');
Route::post('/dettagli/{apartment}', 'PublicController@storeMessage')->name('messaggio');

Route::post('/search', 'PublicController@search')->name('cerca');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function(){

    Route::resource('/apartments','ApartmentController');
    Route::get('/apartments/{apartment}/visible','ApartmentController@change_visibility')->name('visibility');
    Route::get('/apartments/{apartment}/sponsor','ApartmentController@pay')->name('apartments.sponsor');
    Route::get('/apartments/{apartment}/statistic','ApartmentController@statistic')->name('apartments.statistic');
    Route::get('/apartments/{apartment}/messages','ApartmentController@messages')->name('apartments.messages');
    Route::delete('/apartments/{apartment}/messages/{message}/destroy','ApartmentController@messagesDestroy')->name('apartments.messages.destroy');
    Route::get('/apartments/{apartment}/messages/{message}','ApartmentController@messagesShow')->name('apartments.messages.show');
    Route::get('/apartments/{apartment}/statistic/chart','ApartmentController@chart')->name('apartments.chart');
    Route::post('/apartments/{apartment}/sponsor', 'ApartmentController@price')->name('payment.price');
    Route::get('/payment/make', 'ApartmentController@make')->name('payment.make');

});
