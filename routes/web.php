<?php
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'ObjectItemWebController@index');
    Route::get('/objects', 'ObjectItemWebController@index');
    Route::get('/objects/{id}', 'ObjectItemWebController@show');
    Route::post('/objects/create', 'ObjectItemWebController@create');
    Route::post('/objects', 'ObjectItemWebController@store');
    Route::get('/objects/{id}/edit', 'ObjectItemWebController@edit');
    Route::patch('/objects/{id}', 'ObjectItemWebController@update');
    Route::delete('/objects/{id}', 'ObjectItemWebController@destroy');
    Route::patch('/objects/{parent}/attach/{child}', 'ObjectItemWebController@attachObjectItem');
    Route::patch('/objects/{parent}/detach/{child}', 'ObjectItemWebController@detachObjectItem');
});

