<?php



    Route::get('/', 'InviteController@index')->name('v2index');
    Route::get('/invite/{invite}', 'InviteController@index');
    Route::get('/invite/{invite_code}', 'InviteController@invite');


    Route::get('/steam/verify/{invite_code}/', 'SteamController@redirectToSteam')->name('redirectToSteam');
    Route::get('/steam/callback/{invite_code}/', 'SteamController@steamVerifyLogin')->name('steamVerifyLogin');
