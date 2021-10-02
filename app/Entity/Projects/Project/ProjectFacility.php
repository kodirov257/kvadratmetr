<?php

namespace App\Entity\Projects\Project;

use App\Entity\BasePivot;
use App\Entity\Project\Facility;

/**
 * @property int $project_id
 * @property int $facility_id
 * @property int $sort
 *
 * @property Project $project
 * @property Facility $facility
 */
class ProjectFacility extends BasePivot
{
    protected $table = 'project_project_facilities';

    protected $fillable = [
        'project_id', 'facility_id', 'sort'
    ];

    public function isFacilityIdEqualTo(int $facilityId): bool
    {
        return $this->facility_id === $facilityId;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }


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
