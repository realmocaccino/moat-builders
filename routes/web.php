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

Route::middleware('guest')->group(function() {
    Route::group(['prefix' => 'login', 'as' => 'login.'], function() {
        Route::get('/', 'LoginController@index')->name('index');
        Route::post('authenticate', 'LoginController@authenticate')->name('authenticate');
    });

    Route::group(['prefix' => 'register', 'as' => 'register.'], function() {
        Route::get('/', 'RegisterController@index')->name('index');
        Route::post('submit', 'RegisterController@submit')->name('submit');
    });
});

Route::middleware('auth')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('logout', 'LoginController@logout')->name('logout');
    
    Route::get('artist/{artistId}/albums', 'ArtistController@albums')->name('artist.albums');
    
    Route::group(['prefix' => 'albums', 'as' => 'albums.'], function() {
        Route::get('/', 'AlbumsController@index')->name('index');
        Route::get('create/{artistId?}', 'AlbumsController@createPage')->name('createPage');
        Route::post('create/{artistId?}', 'AlbumsController@create')->name('create');
        Route::get('edit/{albumId}', 'AlbumsController@editPage')->name('editPage');
        Route::put('edit/{albumId}', 'AlbumsController@edit')->name('edit');
        Route::get('delete/{albumId}', 'AlbumsController@deletePage')->name('deletePage')->middleware('isAdmin');
        Route::delete('delete/{albumId}', 'AlbumsController@delete')->name('delete')->middleware('isAdmin');
    });
});