<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/

Route::get('token', '..\Auth\AuthController@token');

Route::post('login', 'SesionAPIController@store');

Route::get('logout', 'SesionAPIController@destroy');

Route::post('register/{rol}', 'UserAPIController@register');

Route::post('edit_register/{rol}', 'UserAPIController@editRegister');

Route::get('validate_user/{user}', 'UserAPIController@validateRepeatUser');

Route::resource('typeneedies', 'TypeneedyAPIController');

Route::get('typeneedies_e/familytype', 'TypeneedyAPIController@getFamilyType');


Route::resource('typeidentifications', 'TypeidentificationAPIController');

Route::resource('typecontributors', 'TypecontributorAPIController');

Route::resource('typehelps', 'TypehelpAPIController');

Route::resource('needies', 'NeedyAPIController'); // algunas tienen restricción.
Route::get('needies_big_image/{id}', 'NeedyAPIController@getbigImage');

Route::resource('contributors', 'ContributorAPIController'); // algunas tienen restricción.
Route::get('contributors_big_image/{id}', 'ContributorAPIController@getbigImage');

Route::group(['middleware' => ['before' => 'jwt.auth']], function () {



});


// In testing

  Route::resource('images', 'ImageAPIController');
  Route::resource('examples', 'ExampleAPIController');
  Route::resource('helps', 'HelpAPIController'); 
  Route::resource('ideas', 'IdeasAPIController');
  Route::get('ideas_e/showwithuser/{id}', 'IdeasAPIController@showWithUser');

  Route::get('helps_e/contributor/{idcontributor}/{maxId}', 'HelpAPIController@indexWithForeysOfContributor');
  Route::get('helps_e/needy/{idneedy}/{maxId}', 'HelpAPIController@indexWithForeysOfNeedy');
  Route::get('helps_e/allneedy/{maxId}', 'HelpAPIController@indexWithAllNeedy');
  Route::get('helps_e/lastneedy/{idneedy}', 'HelpAPIController@indexWithLastHelpOfNeedy');
  Route::post('helps_e', 'HelpAPIController@registerNewHelp');
  Route::post('helps_e/register_help', 'HelpAPIController@updateAsColaborator');
  Route::post('helps_e/register_delivered', 'HelpAPIController@updateAsDelivered');
  Route::post('helps_e/register_accepted', 'HelpAPIController@updateAsAccepted');
  