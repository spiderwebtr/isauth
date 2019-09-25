<?php
Route::middleware('web')->namespace("spiderwebtr\isauth")->group(function (){
    Route::get("isAuth","isAuthController@isAuth")->name("isAuth");
    Route::post("ajaxlogin","isAuthController@ajaxlogin");
});
