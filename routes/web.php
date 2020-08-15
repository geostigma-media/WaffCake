<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
  if (Auth::check()) {
    return redirect('/home');
  } else {
    return view('auth.login');
  }
});
Route::get('/referidos',  'ClientContreller@referide')->name('referide');
Route::get('/encuesta', function () {
  return view('surveysPublic');
});
Route::post('/registro_referidos', 'ClientContreller@create_referide')->name('create_referide');
Route::post('/encuesta/publica', 'SurveysController@surveyPublic')->name('surveyPublic');
Route::get('/terminos_condicones', 'ClientContreller@terminosCondiciones')->name('terminos_condicones');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/logout',  'Auth\LoginController@logout')->name('logout');
  Route::get('/usuario/edit/{id}', 'HomeController@getUser')->name('getUser');
  Route::put('/usuario/{id}', 'HomeController@updateUser')->name('updateUser');
  Route::group(['middleware' => ['admin']], function () {

    Route::get('/clientes', 'ClientContreller@index')->name('clients');
    Route::delete('/cliente/{user}', 'ClientContreller@destroy')->name('deleteUser');
    Route::get('/cliente/edit/{id}', 'ClientContreller@getClient')->name('getClient');
    Route::put('/cliente/{id}', 'ClientContreller@updateClient')->name('updateClient');

    //TARJETA Fiel
    Route::post('/cliente/activar_tarjeta/', 'ClientContreller@activateTarjet')->name('activateTarjet');
    Route::post('/referideDiscount', 'ClientContreller@referideDiscount')->name('referideDiscount');
    Route::post('/updateUserReferides', 'ClientContreller@updateUserReferides')->name('updateUserReferides');

    //VENTAS
    Route::get('/ventas', 'BuyController@index')->name('buys');
    Route::get('/ventas/crear', 'BuyController@create')->name('buys_create');
    Route::post('/ventas/create', 'BuyController@store')->name('buys_store');
    Route::post('/ventas/create_regular', 'BuyController@storeRegular')->name('buys_storeRegular');
    Route::get('/load_buys/{id}', 'BuyController@loadBuys')->name('loadBuys');
    Route::post('/crear_cliente', 'BuyController@createClient')->name('createClient');
    Route::put('/renovacion_codigo/{user}', 'BuyController@codeRenovation')->name('codeRenovation');
    Route::delete('/ventas/eliminar/{id}', 'BuyController@destroy')->name('buy_delete');

    //ENCUESTAS
    Route::get('/encuestas', 'SurveysController@index')->name('allSurveys');
    Route::post('/encuestas/create', 'SurveysController@store')->name('surveysCreate');
    Route::post('/encuestas/resultados/{id}', 'SurveysController@surveysResults')->name('surveysResults');
    Route::get('/encuestas_publicas/resultados', 'SurveysController@surveysResultsPublic')->name('surveysResultsPublic');
    Route::delete('/encuestas/eliminar/{id}', 'SurveysController@destroy')->name('deleteSurvy');
    Route::put('/encuestas/estado/{id}', 'SurveysController@stateSurvey')->name('stateSurvey');
    Route::get('/encuestas/grafica', 'SurveysController@chartSurvey')->name('chartSurvey');
    Route::get('/encuestas/editar/{id}', 'SurveysController@surveyEdit')->name('surveyEdit');
    Route::put('/encuestas/{id}', 'SurveysController@surveyUpdate')->name('surveyUpdate');
  });

  Route::group(['middleware' => ['client']], function () {
    Route::post('/sendemail', 'HomeController@sendEmail')->name('sendemail');
    //Route::post('/sendemail{onlyCode}', 'HomeController@sendEmail')->name('sendemail');
    //ENCUESTAS
    Route::post('/encuestas/responder', 'SurveysController@responseSurveys')->name('responseSurveys');
  });
});
