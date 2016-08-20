<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/19 0019
 * Time: 下午 12:59
 */
Route::get('/tag','TagController@index')->name('admin.tag.show');
Route::get('/tag/create','TagController@create')->name('admin.tag.create');
Route::get('/tag/{id}/edit','TagController@edit')->name('admin.tag.edit');
Route::get('/tag/{id}/destroy','TagController@destroy')->name('admin.tag.destroy');
Route::post('/tag','TagController@store')->name('admin.tag.store');
Route::post('/tag/{id}/update','TagController@update')->name('admin.tag.update');