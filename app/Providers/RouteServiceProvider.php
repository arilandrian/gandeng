<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard/donatur'; // <--- Ini diatur ke dashboard default donatur

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Konfigurasi Rate Limiting untuk API (optional, default Laravel)
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Mendefinisikan rute-rute aplikasi
        $this->routes(function () {
            // Rute API
            Route::middleware('api')
                ->prefix('api') // Semua rute di sini akan memiliki prefiks /api
                ->group(base_path('routes/api.php')); // Menggunakan file routes/api.php

            // Rute Web
            Route::middleware('web')
                ->group(base_path('routes/web.php')); // Menggunakan file routes/web.php
        });
    }
}