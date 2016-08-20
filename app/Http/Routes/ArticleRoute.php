<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16 0016
 * Time: 下午 12:00
 */

Route::get('{slug}','ArticleController@show')->name('article.show');