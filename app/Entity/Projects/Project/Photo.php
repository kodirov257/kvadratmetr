<?php

namespace App\Entity\Projects\Project;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $project_id
 * @property string $file
 * @property string $sort
 */
class Photo extends Model
{
    protected $table = 'project_project_photos';

    public $timestamps = false;

    protected $fillable = ['file', 'sort'];

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }
}
