<?php

namespace App\Events\Project;

use App\Entity\Projects\Project\Project;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ModerationPassed
{
    use Dispatchable, SerializesModels;

    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }
}
