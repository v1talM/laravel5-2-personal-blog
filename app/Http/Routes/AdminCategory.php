<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/18 0018
 * Time: 下午 9:05
 */
Route::get('category','CategoryController@index')->name('admin.category.show');
Route::get('category/{id}/edit','CategoryController@edit')->name('admin.category.edit');
Route::post('category/create','CategoryController@store')->name('admin.category.store');
Route::get('category/{id}/destroy','CategoryController@destroy')->name('admin.category.destroy');
Route::post('category/{id}/update','CategoryController@update')->name('admin.category.update');
Route::get('category/trash','CategoryController@trash')->name('admin.category.trash');
Route::get('category/{id}/delete','CategoryController@delete')->name('admin.category.delete');
Route::get('category/{id}/restore','CategoryController@restore')->name('admin.category.restore');
