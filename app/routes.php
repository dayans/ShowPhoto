<?php

use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('login');
});

Route::get('/login', 'HomeController@login');
Route::get('/register/{er?}', 'HomeController@register');

Route::get('user/display', 'ShowController@userDisplay');
Route::get('admin/display', 'ShowController@adminDisplay');
Route::get('/inform','ShowController@inform');

Route::post('login/check', 'UpdateController@check');
Route::post('registerpost', 'UpdateController@registerpost');
Route::post('upload', 'UpdateController@upload');
Route::get('/good/{id}', 'UpdateController@good');
Route::post('/comment', 'UpdateController@comment');
Route::get('/del/{id}','UpdateController@del');
Route::post('/change','UpdateController@change');

Route::get('/test', 'test@test');