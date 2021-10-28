<?php

namespace App\Entity\Project;

use App\Entity\Project\Projects\Project;
use App\Entity\Project\Projects\SaleOffice;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $owner_id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $about_uz
 * @property string $about_ru
 * @property string $about_en
 * @property string $slug
 * @property int $status
 * @property string $main_number
 * @property string $call_center
 * @property string $website
 * @property string $email
 * @property string $facebook
 * @property string $instagram
 * @property string $tik_tok
 * @property string $telegram
 * @property string $youtube
 * @property string $twitter
 * @property string $address_uz
 * @property string $address_ru
 * @property string $address_en
 * @property string $landmark_uz
 * @property string $landmark_ru
 * @property string $landmark_en
 * @property string $lng
 * @property string $ltd
 * @property int $impressions
 * @property int $clicks
 * @property int $leads
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $owner
 * @property Project[] $projects
 * @property SaleOffice[] $saleOffices
 *
 * @property string $name
 * @property string $about
 * @property string $address
 * @property string $landmark
 * @mixin Eloquent
 */
class Developer extends Model
{
    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 5;

    protected $table = 'project_developers';

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'about_uz', 'about_ru', 'about_en', 'slug', 'status', 'main_number',
        'call_center', 'website', 'email', 'facebook', 'instagram', 'tik_tok', 'telegram', 'youtube', 'twitter',
        'address_uz', 'address_ru', 'address_en', 'landmark_uz', 'landmark_ru', 'landmark_en', 'lng', 'ltd',
        'impressions', 'clicks', 'leads','logo'
    ];

    public function getStatusLabel(): string
    {
        switch ($this->status) {
            case self::STATUS_INACTIVE:
                return '<span class="badge badge-danger">' . trans('adminlte.inactive') . '</span>';
            case self::STATUS_ACTIVE:
                return '<span class="badge badge-success">' . trans('adminlte.active') . '</span>';
            default:
                return '<span class="badge badge-info">Default</span>';
        }
    }

    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return htmlspecialchars_decode(LanguageHelper::getName($this));
    }

    public function getAboutAttribute(): string
    {
        return htmlspecialchars_decode(LanguageHelper::getAbout($this));
    }

    public function getAddressAttribute(): string
    {
        return htmlspecialchars_decode(LanguageHelper::getAddress($this));
    }

    public function getLandmarkAttribute(): string
    {
        return htmlspecialchars_decode(LanguageHelper::getLandmark($this));
    }

    ###########################################


    ########################################### Relations

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'developer_id', 'id');
    }

    public function saleOffices()
    {
        return $this->hasMany(SaleOffice::class, 'developer_id', 'id');
    }

    ###########################################
}