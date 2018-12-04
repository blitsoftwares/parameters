<?php

Route::resource('parametercategories','CategoryParameterController');
Route::resource('parameters','ParameterController');
Route::get('adjust/parameters/','ParameterController@lucas')->name('parameters.adjust');