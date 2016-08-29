<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/14 0014
 * Time: 下午 2:48
 */

$router->get('/','HomeController@index')->name('admin.home');
$router->get('/subscribe','HomeController@subscribe')->name('admin.subscribe.show');