<?php

namespace App\Entity\User;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImageHelper;

/**
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $birth_date
 * @property int $gender
 * @property int $region
 * @property string $address
 * @property string $fullName
 * @property string $avatar
 * @property string $passport
 *
 * @property string $avatarThumbnail
 * @property string $avatarOriginal
 *
 * @property User $user
 * @mixin Eloquent
 */
class Profile extends Model
{
    const GENDER_EMPTY = 0;
    const FEMALE = 1;
    const MALE = 2;

    protected $table = 'profiles';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'birth_date', 'gender', 'address', 'avatar', 'region', 'passport'
    ];
    protected $casts = [
        'birth_date' => 'datetime',
    ];

    public static function new($userId, $firstName = null, $lastName = null, $birthDate = null, $gender = null, $address = null, $avatar = null, $region = null,$passport = null): self
    {
        return static::create([
            'user_id' => $userId,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'birth_date' => $birthDate,
            'gender' => $gender,
            'address' => $address,
            'avatar' => $avatar,
            'region' => $region,
            'passport' => $passport
        ]);
    }

    public function edit($firstName = null, $lastName = null, $birthDate = null, $gender = null, $address = null, $avatar = null , $region = null,$passport = null)
    {
        $this->update([
            'first_name' => $firstName ?? $this->first_name,
            'last_name' => $lastName ?? $this->last_name,
            'birth_date' => $birthDate ?? $this->birth_date,
            'gender' => $gender ?? $this->gender,
            'address' => $address ?? $this->address,
            'avatar' => $avatar ?? $this->avatar,
            'region' => $region ?? $this->region,
            'passport' => $passport ?? $this->passport,
        ]);
    }

    public static function gendersList(): array
    {
        return [
            self::GENDER_EMPTY => '',
            self::FEMALE => trans('adminlte.female'),
            self::MALE => trans('adminlte.male'),
        ];
    }

    public function genderName(): string
    {
        return self::gendersList()[$this->gender];
    }

    public function getRegionName($name = null)
    {
        foreach (self::regionsList() as $i => $region){
            if ($i === $name)
            {
                return $region;
            }
        }

        return '';
    }

    public function regionName(): string
    {
        return self::regionsList()[$this->region];
    }

    public function getAvatarThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PROFILES . '/' . $this->user_id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->avatar;
    }

    public function getAvatarOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PROFILES . '/' . $this->user_id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->avatar;
    }

    public function getPassportThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PASSPORT . '/' . $this->user_id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->passport;
    }

    public function getPassportOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PASSPORT . '/' . $this->user_id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->passport;
    }

    public function getFullNameAttribute(): string
    {
        return "$this->last_name $this->first_name";
    }


    ########################################### Relations

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    ###########################################
}
