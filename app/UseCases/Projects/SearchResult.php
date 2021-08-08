<?php

namespace App\UseCases\Projects;

use Illuminate\Contracts\Pagination\Paginator;

class SearchResult
{
    public $projects;
    public $regionsCounts;
    public $categoriesCounts;

    public function __construct(Paginator $projects, array $regionsCounts, array $categoriesCounts)
    {
        $this->projects = $projects;
        $this->regionsCounts = $regionsCounts;
        $this->categoriesCounts = $categoriesCounts;
    }
}
