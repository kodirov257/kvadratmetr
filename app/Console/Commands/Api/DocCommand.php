<?php

namespace App\Console\Commands\Api;

use App\Entity\Projects\Project\Project;
use App\UseCases\Projects\ProjectService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DocCommand extends Command
{
    protected $signature = 'api:doc';

    public function handle(): void
    {
        $swagger = base_path('vendor/bin/swagger');
        $source = app_path('Http');
        $target = public_path('docs/swagger.json');

        passthru('"' . PHP_BINARY . '"' . " \"{$swagger}\" \"{$source}\" --output \"{$target}\"");
    }
}
