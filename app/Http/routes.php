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

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/novo-voluntario', function() {
	return view('volunteer_form');
});
*/

Route::get('/novo-voluntario/{zipCode}', 'VolunteerController@signUp');

Route::post('/registrar-voluntario', 'VolunteerController@register');

Route::get('/confirmar-voluntario/{token}', 'VolunteerController@confirm');

Route::get('/listar-clubes', 'ClubListingController@listAll');

Route::get('/listar-clubes-proximos/{zipCode}', 'ClubListingController@showClubsNearby');

Route::get('/eu-quero', 'VolunteerController@selfService');

Route::get('/debug', 'DebugController@debug');