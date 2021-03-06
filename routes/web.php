<?php

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

Route::get('/', [ 'as' => 'homepage', 'uses' => function () {
    return view('landing');
}]);

Route::resource('resources', 'ResourceController');
Route::resource('tags', 'TagController');
Route::resource('songs', 'SongController');
Route::resource('chords', 'ChordController');
Route::resource('listings', 'ListingController');

Route::get('cypher/{song}', ['as' => 'songs.cypher', 'uses' => 'SongController@cypher']);
Route::put('cypher/{song}', ['as' => 'songs.conclude', 'uses' => 'SongController@conclude']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');