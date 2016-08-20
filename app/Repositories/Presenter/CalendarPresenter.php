<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/18 0018
 * Time: 下午 4:10
 */

namespace App\Repositories\Presenter;


use Gloudemans\Calendar\Facades\Calendar;

class CalendarPresenter
{
    public function getCalendar()
    {
        return Calendar::generate();
    }
}