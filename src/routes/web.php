<?php

Route::resource('parametercategories','CategoryParameterController');
Route::resource('parameters','ParameterController');
Route::get('adjust/parameters/value','ParameterController@adjust')->name('parameters.adjust');
Route::post('adjust/parameters/update', 'ParameterController@updateParameter')->name('parameters.updateParameter');
