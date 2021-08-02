<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicFieldController;
use App\Http\Controllers\PagesController;

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

//Route::get('/', function () {
  //  return view('portfolio');
//});

//dashboard routes
Route::get('/index', 'PagesController@index')->name('home');
Route::get('/admin/dashboard', 'PagesController@dashboard')->name('admin.dashboard');
//home page routes
Route::get('/admin/main', 'MainPagesController@index')->name('admin.main');
Route::put('/admin/main', 'MainPagesController@update')->name('admin.main.update');
//abouts page routes
//Route::get('/abouts/create', 'AboutPagesController@create')->name('admin.abouts.create');
//Route::put('/abouts/create', 'AboutPagesController@store')->name('admin.abouts.store');
//Route::get('/abouts/list', 'AboutPagesController@list')->name('admin.abouts.list');
//Route::get('/abouts/edit/{id}', 'AboutPagesController@edit')->name('admin.abouts.edit');
//Route::post('/abouts/update/{id}', 'AboutPagesController@update')->name('admin.abouts.update');
//Route::delete('/abouts/destroy/{id}', 'AboutPagesController@destroy')->name('admin.abouts.destroy');

//Route::get('/contacts/create', 'ContactPagesController@create')->name('admin.contacts.create');
//Route::put('/contacts/create', 'ContactPagesController@store')->name('admin.contacts.store');
//Route::get('/contacts/list', 'ContactPagesController@list')->name('admin.contacts.list');
//Route::get('/contacts/edit/{id}', 'ContactPagesController@edit')->name('admin.contacts.edit');
//Route::post('/contacts/update/{id}', 'ContactPagesController@update')->name('admin.contacts.update');
//Route::delete('/contacts/destroy/{id}', 'ContactPagesController@destroy')->name('admin.contacts.destroy');

Route::get('/admin/about', 'PagesController@about')->name('admin.about');
//contact page routes of admin
Route::get('/contact/index', 'ContactPagesController@index')->name('pages.contacts.index');
Route::get('/contacts/create', 'ContactPagesController@create')->name('pages.contacts.create');
Route::put('/contacts/create', 'ContactPagesController@store')->name('pages.contacts.store');
Route::get('/contacts/read', 'ContactPagesController@show')->name('pages.contacts.read');
Route::get('/contacts/edit/{id}', 'ContactPagesController@edit')->name('pages.contacts.edit');
Route::post('/contacts/update/{id}', 'ContactPagesController@update')->name('pages.contacts.update');
Route::delete('/contacts/destroy/{id}', 'ContactPagesController@destroy')->name('pages.contacts.destroy');

Route::get('dynamic-field', 'DynamicFieldController@index');
Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
