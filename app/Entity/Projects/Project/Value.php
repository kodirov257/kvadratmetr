<?php

namespace App\Entity\Projects\Project;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $characteristic_id
 * @property string $value
 */
class Value extends Model
{
    protected $table = 'project_project_values';

    public $timestamps = false;

    protected $fillable = ['characteristic_id', 'value'];
}
