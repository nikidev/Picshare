<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('photo/list', 'PhotoController@viewPhotoList');
Route::post('photo/do-upload','PhotoController@doPhotoUpload');
Route::get('photo/delete/{id}','PhotoController@deletePhoto');


Route::get('users', 'UserController@UsersList');
Route::get('user/photos/{id}', 'UserController@viewUserPhotos');
Route::get('user/delete/{id}','UserController@deleteUser');
Route::get('/my-profile', 'UserController@showUserProfile');


Route::get('/about-us', function()
{
     return view('about-us');
});


