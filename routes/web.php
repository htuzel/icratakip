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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['passwordreset']], function() {
    Route::get('/home', 'HomeController@index')->name('home'); //anasayfa rotası
    Route::view('/kullanici-kayit', 'user.register')->name('kayit-form');
    Route::get('/kullanici-duzenle/{userid}', 'UserController@editUser')->name('duzenle-form');
    Route::post('/kullanici-kayit', 'UserController@registerUser')->name('kayit');
    Route::post('/kullanici-duzenle', 'UserController@updateUser')->name('duzenle');
    Route::get('/cases/new/{user_id}', 'CourtController@newCourtForm')->name('mahkeme-form');
    Route::post('/cases/new', 'CourtController@newCourt')->name('mahkeme-ekle');
    Route::get('/cases/{user_id}', 'CourtController@UserCases')->name('kullanici-davalari');
    Route::get('/mahkeme-notlari/{court_id}', 'NotesController@courtNotes')->name('mahkeme-notlari');
    Route::get('/mahkeme-duzenle/{court_id}', 'CourtController@editCourt')->name('duzenle-mahkeme');
    Route::post('/mahkeme-duzenle', 'CourtController@updateCourt')->name('duzenle-mahkeme2');
    Route::post('/mahkeme-notlari', 'NotesController@createNote')->name('not-olustur');
    Route::get('/not-duzenle/{court_id}', 'NotesController@editNote')->name('duzenle-not');
    Route::post('/note-duzenle', 'NotesController@updateNote')->name('guncelle-not');
    Route::get('/not-sil/{court_id}', 'NotesController@destroy')->name('not-sil');
});

Route::view('/profil', 'user.profile')->name('profil');

Route::post('/sifre-degistir', 'UserController@changePassword')->name('sifre-degistir');
