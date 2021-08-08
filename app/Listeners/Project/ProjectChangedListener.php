<?php

namespace App\Listeners\Project;

use App\Jobs\Project\ReindexProject;

class ProjectChangedListener
{
    public function handle($event): void
    {
        ReindexProject::dispatch($event->project);
    }
}
