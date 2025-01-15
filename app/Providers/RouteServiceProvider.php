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
    public const HOME = '/dashboard';
    
    public const STUDENT = '/student/dashboard';
    public const TEACHER = '/teacher/dashboard';
    public const PARENT = '/parent/dashboard';


    public function boot()
    {
        //

        parent::boot();
    } 

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }


    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::middleware('web')
        // Route::middleware('auth:student')
            ->namespace($this->namespace)
            ->group(base_path('routes/student.php'));

        Route::middleware('web')
        // Route::middleware('auth:teacher')
            ->namespace($this->namespace)
            ->group(base_path('routes/teacher.php'));

        Route::middleware('web')
        // Route::middleware('auth:parent')
            ->namespace($this->namespace)
            ->group(base_path('routes/parent.php'));
    }


    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

}
