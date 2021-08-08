<?php

namespace App\Console\Commands\Search;

use App\Entity\Projects\Project\Project;
use App\Entity\Banner\Banner;
use App\Services\Search\ProjectIndexer;
use App\Services\Search\BannerIndexer;
use Illuminate\Console\Command;

class ReindexCommand extends Command
{
    protected $signature = 'search:reindex';

    private $projects;
    private $banners;

    public function __construct(ProjectIndexer $projects, BannerIndexer $banners)
    {
        parent::__construct();
        $this->projects = $projects;
        $this->banners = $banners;
    }
    
    public function handle(): bool
    {
        $this->projects->clear();

        foreach (Project::active()->orderBy('id')->cursor() as $project) {
            $this->projects->index($project);
        }

        $this->banners->clear();

        foreach (Banner::active()->orderBy('id')->cursor() as $banner) {
            $this->banners->index($banner);
        }

        return true;
    }
}
