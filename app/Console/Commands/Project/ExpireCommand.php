<?php

namespace App\Console\Commands\Project;

use App\Entity\Projects\Project\Project;
use App\UseCases\Projects\ProjectService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpireCommand extends Command
{
    protected $signature = 'project:expire';

    private $service;

    public function __construct(ProjectService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): int
    {
        $success = 1;

        foreach (Project::active()->where('expired_at', '<', Carbon::now())->cursor() as $project) {
            try {
                $this->service->expire($project);
            } catch (\DomainException $e) {
                $this->error($e->getMessage());
                $success = 0;
            }
        }

        return $success;
    }
}
