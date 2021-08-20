<?php

namespace App\Entity\Projects\Project;

use App\Entity\BasePivot;
use App\Entity\Projects\Facility;

/**
 * @property int $project_id
 * @property int $facility_id
 *
 * @property Project $project
 * @property Facility $facility
 */
class ProjectFacility extends BasePivot
{
    protected $table = 'project_project_facilities';

    protected $fillable = [
        'project_id', 'facility_id',
    ];


    ########################################### Relations

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'id');
    }

    ###########################################
}
