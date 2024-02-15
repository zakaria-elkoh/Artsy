<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Project;
use Illuminate\Auth\GenericUser;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        $this->registerPolicies();

        Gate::define('update_project', function ($project) {
            $user = Auth::user();
            return $project->partner_id == $user->id || $user->roles->contains('name', 'admin');
        });
        
        // Gate::define('update_project', 'App\Policies\ProjectPolicy@update');

        Gate::define('is_admin', function () {
            return Auth::user()->roles->contains('name', 'admin');
        });

        Gate::define('is_artist', function () {
            return Auth::user()->roles->contains('name', 'artist');
        });

        Gate::define('is_admin_or_partner', function () {
            $roles = Auth::user()->roles;
            return $roles->contains('name', 'admin') || $roles->contains('name', 'partner');
        });
    }
}
