<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/niveles', function()
{
	return view('layouts.niveles');
});
Route::get('/guia', function()
{
	return view('layouts.guia');
});
Route::get('/calendarios', function()
{
	return view('layouts.calendarios');
});
Route::get('/motivacion', function()
{
	return view('layouts.motivacion');
});

Route::resource('token','TokensController');
Route::auth();


Route::group(['middleware' => 'auth'], function () {

    Route::get('home', function () {
        return view('home');
    });

    Route::resource('materias','MateriasController');
    Route::resource('profesores','ProfesoresController');
    Route::resource('temas','TemasController');
    Route::resource('preguntas','PreguntasController');
    Route::resource('front','FrontController');
    Route::resource('user','UserController');


    //Route::get('lista/{id}/mateias','FrontController@listaMaterias');
    Route::get('titulos/{id}','FrontController@showTemas');
    Route::get('finalshow/{id}','FrontController@finalShow');
    Route::resource('createma','TemasController@createma');
    Route::resource('creapregunta','PreguntasController@creapregunta');
    Route::post('profesores/reclutar','ProfesoresController@reclutar');
    Route::post('profesores/asignar','ProfesoresController@asignar');
    Route::post('profesores/quitar','ProfesoresController@quitar');
    Route::get('profesores/{id}/impartidas','ProfesoresController@impartidas');
    Route::get('dashboard/','ProfesoresController@dashboard');
    Route::post('finalshow/{sendmail}','FrontController@sendMail');
    Route::post('includenewtoken/','FrontController@includeNewToken');
    /*Route::post('includenewtoken/', [
        'as' => 'token.submit',
        'uses' => 'FrontController@includeNewToken'
    ]);*/



});


Auth::routes();

Route::get('/home', 'HomeController@index');
