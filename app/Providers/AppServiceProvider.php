<?php

namespace App\Providers;

use App\Models\Total;
use App\Vital\Repositories\HomeRepository;
use App\Vital\Services\HomeService;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('zh');
        $carbon = new Carbon();
        $total = Total::where('month','=',$carbon->month)
            ->firstOrCreate(['month'=>$carbon->month, 'year'=>$carbon->year]);
        $total->increment('visit_count');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
