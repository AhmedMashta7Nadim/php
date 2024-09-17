<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Officar;
use App\Policies\OfficerPolicy;
use App\Policies\officerPollicie;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        
        Officar::class => OfficerPolicy::class
       // Officar::class=>officerPollicie::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
       
    }
}
