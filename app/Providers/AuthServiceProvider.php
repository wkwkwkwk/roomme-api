<?php

namespace App\Providers;

use App\Models\RoomMeBuildings;
use App\Models\RoomMeUser;
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

        Gate::define('update-location', function (RoomMeUser $user, RoomMeBuildings $building) {
            return $user->id === $building->build_userid;
        });
    }
}
