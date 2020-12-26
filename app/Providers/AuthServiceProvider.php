<?php

namespace App\Providers;

use App\Models\Job;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('publish-jobs', function ($user) {
            return $user->isBusinessUser();
        });

        Gate::define('favorite-jobs', function ($user) {
            return !$user->isBusinessUser();
        });

        Gate::define('update-job', function (Job $job) {
            return auth()->user()->userable->id === $job->owner->id;
        });
    }
}
