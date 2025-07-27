<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\RateLimiter;

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
        RateLimiter::for('authenticate', function (Request $request) {
            return Limit::perMinute(5)->response(function (Request $request, array $headers) {
                return back()->withInput()->with('status', 'Você atingiu o limite de tentativas. Tente novamente em 1 minuto.');
            });
        });
    }
}
