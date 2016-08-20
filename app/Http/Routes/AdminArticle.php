<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/17 0017
 * Time: 下午 4:56
 */
Route::get('/article/list', 'ArticleController@index')->name('admin.article.show');
Route::get('/article/create','ArticleController@create')->name('admin.article.create');
Route::post('/article/create','ArticleController@store')->name('admin.article.store');
Route::get('/article/{id}/edit','ArticleController@edit')->name('admin.article.edit');
Route::get('/article/{id}/destroy','ArticleController@destroy')->name('admin.article.destroy');
Route::get('/article/{id}/recommened','ArticleController@recommened')->name('admin.article.recommened');
Route::get('/article/{id}/top','ArticleController@top')->name('admin.article.top');
Route::post('/article/{id}','ArticleController@update')->name('admin.article.update');
Route::get('/article/trash','ArticleController@trash')->name('admin.article.trash');
Route::get('/article/{id}/delete','ArticleController@delete')->name('admin.article.delete');
Route::get('/article/{id}/restore','ArticleController@restore')->name('admin.article.restore');