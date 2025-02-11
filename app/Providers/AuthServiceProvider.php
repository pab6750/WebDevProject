<?php

namespace App\Providers;

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

        Gate::define('update-post', function($user, $post) {
          return $user->id == $post->user_id || $user->isAdmin;
        });

        Gate::define('update-comment', function($user, $comment) {
          return $user->id == $comment->user_id || $user->isAdmin;
        });

        Gate::define('update-user_page', function($user, $user_page) {
          return $user->id == $user_page->user_id || $user->isAdmin;
        });
    }
}
