<?php

namespace App\Services\Search;

use App\Entity\Project\Projects\Project;
use App\Entity\Project\Projects\Value;
use Elasticsearch\Client;

class ProjectIndexer
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function clear(): void
    {
        $this->client->deleteByQuery([
            'index' => 'projects',
            'type' => 'project',
            'body' => [
                'query' => [
                    'match_all' => new \stdClass(),
                ],
            ],
        ]);
    }

    public function index(Project $project): void
    {
        $regions = [];
        if ($region = $project->region) {
            do {
                $regions[] = $region->id;
            } while ($region = $region->parent);
        }

        $this->client->index([
            'index' => 'projects',
            'type' => 'project',
            'id' => $project->id,
            'body' => [
                'id' => $project->id,
                'published_at' => $project->published_at ? $project->published_at->format(DATE_ATOM) : null,
                'title' => $project->title,
                'content' => $project->content,
                'price' => $project->price,
                'status' => $project->status,
                'categories' => array_merge(
                    [$project->category->id],
                    $project->category->ancestors()->pluck('id')->toArray()
                ),
                'regions' => $regions ?: [0],
                'values' => array_map(function (Value $value) {
                    return [
                        'characteristic' => $value->characteristic_id,
                        'value_string' => (string)$value->value,
                        'value_int' => (int)$value->value,
                    ];
                }, $project->values()->getModels()),
            ],
        ]);
    }

    public function remove(Project $project): void
    {
        $this->client->delete([
            'index' => 'projects',
            'type' => 'project',
            'id' => $project->id,
        ]);
    }
}