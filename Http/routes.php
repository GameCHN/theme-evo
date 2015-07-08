<?php

Route::group(['prefix' => 'evo', 'namespace' => 'YC\Evo\Http\Controllers'], function()
{
	Route::get('/', 'EvoController@index');
});