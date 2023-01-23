<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //стандартные роуты oauth
        Passport::routes(null, ['prefix' => 'api/v1/oauth', 'middleware' => 'api']);
        Passport::tokensExpireIn(now()->addMinutes(config('passport.tokens_lifetime.minutes_for_access')));
        Passport::refreshTokensExpireIn(now()->addDays(config('passport.tokens_lifetime.days_for_refresh')));
    }
}
