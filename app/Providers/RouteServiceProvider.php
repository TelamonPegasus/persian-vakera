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
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAuthRoutes();
        $this->mapAdminRoutes();
        $this->mapProfileRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapAuthRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/auth.php'));
    }


    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/home.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'auth', 'checkAdmin'])
            ->name('admin.')
            ->prefix("admin")
            ->group(base_path('routes/web/admin.php'));
    }

    protected function mapProfileRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->name('profile.')
            ->prefix("profile")
            ->group(base_path('routes/web/profile.php'));
    }
}
