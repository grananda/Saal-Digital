<?php
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'ObjectItemWebController@index');
    Route::get('/home', 'ObjectItemWebController@index');
    Route::get('/objects', 'ObjectItemWebController@index');
    Route::post('/objects/search', 'ObjectItemWebController@search');
    Route::get('/objects/create', 'ObjectItemWebController@create')->middleware('can:create,App\Models\ObjectItem');
    Route::get('/objects/{id}', 'ObjectItemWebController@show');
    Route::post('/objects', 'ObjectItemWebController@store')->middleware('can:create,App\Models\ObjectItem');
    Route::get('/objects/{id}/edit', 'ObjectItemWebController@edit')->middleware('can:update,App\Models\ObjectItem');
    Route::patch('/objects/{id}', 'ObjectItemWebController@update')->middleware('can:update,App\Models\ObjectItem');
    Route::delete('/objects/{id}', 'ObjectItemWebController@destroy')->middleware('can:delete,App\Models\ObjectItem');
    Route::patch('/objects/{parent}/attach/{child}', 'ObjectItemWebController@attachObjectItem');
    Route::patch('/objects/{parent}/detach/{child}', 'ObjectItemWebController@detachObjectItem');
});

Auth::routes();

