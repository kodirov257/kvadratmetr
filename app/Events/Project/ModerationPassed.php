<?php

namespace App\Events\Project;

use App\Entity\Project\Projects\Project;
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
