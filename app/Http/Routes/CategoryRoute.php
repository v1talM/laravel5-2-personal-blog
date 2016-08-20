<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16 0016
 * Time: 下午 5:04
 */

Route::get('{slug}', 'CategoryController@show')->name('category.show');