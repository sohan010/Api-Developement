<?php

// SITE ROUTES
Route::apiResource('/class','Api\ClassController');
Route::apiResource('/subject','Api\SubjectController');
Route::apiResource('/section','Api\SectionController');
Route::apiResource('/student1','Api\StudentController');


// JWT TOKEN ROUTES
Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');

    Route::post('payload', 'Api\AuthController@payload');
    Route::post('register', 'Api\AuthController@register');

});






?>