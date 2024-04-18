<?php

namespace App\Providers;

use App\Models\Cv;
use App\Observers\CvObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cv::observe(CvObserver::class);
    }
}
