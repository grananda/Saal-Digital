<?php
Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
    Route::get('/objects', 'ObjectItemApiController@index');
    Route::get('/objects/{id}', 'ObjectItemApiController@show');
    Route::post('/objects', 'ObjectItemApiController@store');
    Route::patch('/objects/{id}', 'ObjectItemApiController@update');
    Route::delete('/objects/{id}', 'ObjectItemApiController@destroy');
    Route::patch('/objects/{parent}/attach/{child}', 'ObjectItemApiController@attachObjectItem');
    Route::patch('/objects/{parent}/detach/{child}', 'ObjectItemApiController@detachObjectItem');
});
