<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicFieldController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ContactPagesController;
use App\Http\Controllers\AboutPageController;

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
  return view('portfolio');
});

//frontend routes
Route::get('/index', 'PagesController@index')->name('home');

//dashboard route
Route::get('/admin/dashboard', 'PagesController@dashboard')->name('admin.dashboard');

//home page routes
Route::get('/admin/main', 'MainPagesController@index')->name('admin.main');
Route::put('/admin/main', 'MainPagesController@update')->name('pages.main.update');

//contact page routes of admin
Route::get('/admin/contact/index', 'ContactPagesController@index')->name('pages.contacts.index');
Route::get('/admin/contacts/create', 'ContactPagesController@create')->name('pages.contacts.create');
Route::put('/admin/contacts/create', 'ContactPagesController@store')->name('pages.contacts.store');
Route::get('/admin/contacts/show/{id}', 'ContactPagesController@show')->name('pages.contacts.read');
Route::get('/admin/contacts/edit/{id}', 'ContactPagesController@edit')->name('pages.contacts.edit');
Route::put('/admin/contacts/update/{id}', 'ContactPagesController@update')->name('pages.contacts.update');
Route::delete('/admin/contacts/destroy/{id}', 'ContactPagesController@destroy')->name('pages.contacts.destroy');

//About page routes of admin
Route::get('/admin/about', 'AboutPageController@index')->name('pages.about');
Route::put('/admin/about', 'AboutPageController@update')->name('pages.about.update');


Route::get('dynamic-field', 'DynamicFieldController@index');
Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
