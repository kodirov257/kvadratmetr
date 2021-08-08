<?php

namespace App\Jobs\Project;

use App\Entity\Projects\Project\Project;
use App\Services\Search\ProjectIndexer;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReindexProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function handle(ProjectIndexer $indexer): void
    {
        $indexer->index($this->project);
    }
}
