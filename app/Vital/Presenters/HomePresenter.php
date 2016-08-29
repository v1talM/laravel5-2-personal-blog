<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/27 0027
 * Time: 下午 12:34
 */

namespace App\Vital\Presenters;


use Carbon\Carbon;

class HomePresenter
{
    public function getPastMonths()
    {
        $past = Carbon::now()->subMonth(6);
        $months = [];
        for($i=6;$i>0;$i--){
            $months[] = $past->addMonth()->month;
        }
        return implode(",",$months);
    }
}