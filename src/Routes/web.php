<?php

//前台测试
Route::group([
    'domain'=> config('hstcms.manage.route.domain') ? env('APP_URL') : '' ,
    'prefix' => 'ftp'
], function() {
    Route::get('/test', 'TestController@index')->name('ftpTestIndex');
});


