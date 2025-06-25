<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // ⚠️ thêm dòng này

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
        // ⚠️ Tự động chuyển sang HTTPS trong môi trường production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
