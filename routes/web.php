<?php
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'ObjectItemWebController@index');
    Route::get('/home', 'ObjectItemWebController@index');
    Route::get('/objects', 'ObjectItemWebController@index');
    Route::post('/objects/search', 'ObjectItemWebController@search');
    Route::get('/objects/create', 'ObjectItemWebController@create');
    Route::get('/objects/{id}', 'ObjectItemWebController@show');
    Route::post('/objects', 'ObjectItemWebController@store');
    Route::get('/objects/{id}/edit', 'ObjectItemWebController@edit');
    Route::patch('/objects/{id}', 'ObjectItemWebController@update');
    Route::delete('/objects/{id}', 'ObjectItemWebController@destroy');
    Route::patch('/objects/{parent}/attach/{child}', 'ObjectItemWebController@attachObjectItem');
    Route::patch('/objects/{parent}/detach/{child}', 'ObjectItemWebController@detachObjectItem');
});

Auth::routes();

