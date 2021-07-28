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

Route::get('/index', 'PagesController@index')->name('home');
Route::get('/admin/dashboard', 'PagesController@dashboard ')->name('admin.dashboard');

Route::get('dynamic-field', 'DynamicFieldController@index');

Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
