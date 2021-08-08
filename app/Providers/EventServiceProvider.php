<?php

namespace App\Providers;

use App\Events\Project\ModerationPassed;
use App\Listeners\Project\ProjectChangedListener;
use App\Listeners\Project\ModerationPassedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ModerationPassed::class => [
            ProjectChangedListener::class,
            ModerationPassedListener::class,
        ],
    ];
}
