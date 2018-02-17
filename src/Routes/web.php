<?php

//后台路由
Route::group([
    'domain'=> config('hstcms.manage.route.domain'),
    'prefix' => config('hstcms.manage.route.prefix').'/ftp',
    'middleware'=>['web', 'manage.auth.check', 'manage.request.log']
], function() {
    Route::get('/index', 'Manage\IndexController@index')->name('manageFtpIndex');
    Route::post('/save', 'Manage\IndexController@save')->name('manageFtpSave');
});

//前台测试
Route::group([
    'domain'=> config('hstcms.manage.route.domain') ? env('APP_URL') : '' ,
    'prefix' => 'ftp'
], function() {
    Route::get('/test', 'TestController@index')->name('ftpTestIndex');
});


