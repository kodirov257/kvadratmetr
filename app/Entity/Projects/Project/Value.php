<?php

namespace App\Entity\Projects\Project;

use App\Entity\Projects\Characteristic;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $project_id
 * @property int $characteristic_id
 * @property string $value
 * @property string $value_from
 * @property string $value_to
 * @property boolean $main
 * @property int $sort
 *
 * @property Project $project
 * @property Characteristic $characteristic
 *
 * @method Builder main()
 * @mixin Eloquent
 */
class Value extends Model
{
    protected $table = 'project_project_values';

    public $incrementing = false;
    protected $primaryKey = ['project_id', 'characteristic_id'];
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'characteristic_id', 'value', 'value_from', 'value_to', 'main', 'sort',
    ];

    public function isMain(): bool
    {
        return $this->main === true;
    }

    public function isCharacteristicIdEqualTo(int $characteristicId): bool
    {
        return $this->characteristic_id === $characteristicId;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }


    ########################################### Scopes

    public function scopeMain(Builder $query)
    {
        return $query->where('main', true);
    }

    ###########################################


    ########################################### Relations

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id', 'id');
    }

    ###########################################
}
