<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Services\AuthService;
use App\Services\UserService;
use App\Services\RetailerService;

use App\Models\User;
use App\Models\Retailer;

use App\Policies\UserPolicy;
use App\Policies\RetailerPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthService::class, function () {
            return new AuthService();
        });

        $this->app->bind(UserService::class, function () {
            return new UserService();
        });

        $this->app->bind(RetailerService::class, function () {
            return new RetailerService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Retailer::class, RetailerPolicy::class);
    }
}
