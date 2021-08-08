<?php

namespace App\UseCases\Projects;

use App\Entity\Projects\Project\Project;
use App\Entity\User\User;

class FavoriteService
{
    public function add($userId, $projectId): void
    {
        $user = $this->getUser($userId);
        $project = $this->getProject($projectId);

        $user->addToFavorites($project->id);
    }

    public function remove($userId, $projectId): void
    {
        $user = $this->getUser($userId);
        $project = $this->getProject($projectId);

        $user->removeFromFavorites($project->id);
    }

    private function getUser($userId): User
    {
        return User::findOrFail($userId);
    }

    private function getProject($projectId): Project
    {
        return Project::findOrFail($projectId);
    }
}
