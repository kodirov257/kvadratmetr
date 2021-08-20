<?php

namespace App\Entity\Projects\Project;

use App\Entity\Projects\Developer;
use App\Helpers\LanguageHelper;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $developer_id
 * @property string $lng
 * @property string $ltd
 * @property string $address_uz
 * @property string $address_ru
 * @property string $address_en
 *
 * @property Developer $developer
 *
 * @property string $address
 * @mixin Eloquent
 */
class SaleOffice extends Model
{
    protected $table = 'project_sale_offices';

    protected $fillable = [
        'lng', 'ltd', 'address_uz', 'address_ru', 'address_en',
    ];


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return htmlspecialchars_decode(LanguageHelper::getName($this));
    }

    ###########################################


    ########################################### Relations

    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'id');
    }

    ###########################################
}