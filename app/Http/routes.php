<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/test','HomeController@test');
Route::post('subscribe','HomeController@subscribe')->name('subscribe');
Route::auth();
Route::post('/admin/file/post','Admin\HomeController@file');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth','role:admin']], function ($router){
    require(__DIR__.'/Routes/HomeRoute.php');
    require(__DIR__.'/Routes/AdminMenu.php');
    require (__DIR__.'/Routes/AdminArticle.php');
    require (__DIR__.'/Routes/AdminCategory.php');
    require (__DIR__.'/Routes/AdminTag.php');
});

Route::group(['prefix' => 'article'], function ($router){
   require(__DIR__.'/Routes/ArticleRoute.php');
});

Route::group(['prefix' => 'category'], function ($router){
   require(__DIR__.'/Routes/CategoryRoute.php');
});

Route::group(['prefix' => 'tag'], function ($router){
    require(__DIR__.'/Routes/TagRoute.php');
});

Route::get('search','SearchController@search')->name('search');

Route::get('rss','HomeController@rss')->name('rss');