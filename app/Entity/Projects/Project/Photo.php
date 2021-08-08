<?php

namespace App\Entity\Projects\Project;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string file
 */
class Photo extends Model
{
    protected $table = 'project_project_photos';

    public $timestamps = false;

    protected $fillable = ['file'];
}
