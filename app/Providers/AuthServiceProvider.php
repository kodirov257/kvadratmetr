<?php

namespace App\Providers;

use App\Entity\Project\Projects\Project;
use App\Entity\Banner\Banner;
use App\Entity\Ticket\Ticket;
use App\Entity\User\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Horizon\Horizon;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        $this->registerPolicies();
        $this->registerPermissions();

        Passport::routes();

        Horizon::auth(function () {
            return Gate::allows('horizon');
        });
    }

    private function registerPermissions(): void
    {
        Gate::define('horizon', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('admin-panel', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-pages', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-users', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-tickets', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-regions', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-projects', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-projects-categories', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-projects-characteristics', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-projects-facilities', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-projects-sale_offices', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-banners', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('show-project', function (User $user, Project $project) {
            return $user->isAdmin() || $user->isModerator() || $project->user_id === $user->id;
        });

        Gate::define('manage-own-project', function (User $user, Project $project) {
            return $project->developer->owner_id === $user->id;
        });

        Gate::define('manage-own-banner', function (User $user, Banner $banner) {
            return $banner->user_id === $user->id;
        });

        Gate::define('manage-own-ticket', function (User $user, Ticket $ticket) {
            return $ticket->user_id === $user->id;
        });
    }
}
