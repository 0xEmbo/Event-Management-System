<?php

namespace App\Providers;

use App\Event;
use App\User;
use Illuminate\Auth\Access\Response;
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

        Gate::define('del-edit-event', function(User $user, Event $event) {
            return $user->id === $event->user_id ? Response::allow() : Response::deny('<center><h1>You are not authorized to do this action!</h1></center>');
        });
    }
}
