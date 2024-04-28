<?php

namespace App\Providers;

use App\Models\Cv;
use App\Models\Blog;
use App\Models\Office;
use App\Models\Worker;
use App\Models\Account;
use App\Models\Country;
use App\Models\SiteSetting;
use App\Observers\CvObserver;
use App\Observers\BlogObserver;
use App\Observers\OfficeObserver;
use App\Observers\WorkerObserver;
use App\Observers\AccountObserver;
use App\Observers\CountryObserver;
use Illuminate\Support\Facades\View;
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
        Blog::observe(BlogObserver::class);
        Country::observe(CountryObserver::class);
        Office::observe(OfficeObserver::class);
        Account::observe(AccountObserver::class);
        Worker::observe(WorkerObserver::class);
        // share data to views inside folder main-site
        View::composer('main-site.*', function ($view) {
            $view->with('siteSettings', SiteSetting::first());
        });
    }
}
