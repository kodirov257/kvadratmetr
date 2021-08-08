<?php

namespace App\Listeners\Project;

use App\Events\Project\ModerationPassed;
use App\Notifications\Project\ModerationPassedNotification;

class ModerationPassedListener
{
    public function handle(ModerationPassed $event): void
    {
        $project = $event->project;
        $project->user->notify(new ModerationPassedNotification($project));
    }
}
