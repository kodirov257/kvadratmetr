<?php

namespace App\Entity\Project;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $type
 * @property string $default
 * @property boolean $required
 * @property array $variants
 * @property boolean $is_range
 * @property integer $sort
 * @property string $icon
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $name
 * @property string $iconThumbnail
 * @property string $iconOriginal
 *
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @mixin Eloquent
 */
class Characteristic extends BaseModel
{
    public const TYPE_STRING = 'string';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_FLOAT = 'float';

    protected $table = 'project_characteristics';

    public $timestamps = false;

    protected $fillable = ['id', 'name_uz', 'name_ru', 'name_en', 'type', 'required', 'default', 'variants', 'is_range', 'sort', 'icon'];

    protected $casts = [
        'variants' => 'array',
    ];

    public static function add(int $id, string $nameUz, string $nameRu, string $nameEn, string $type, bool $required, ?string $variants, ?bool $isRange, string $iconName): self
    {
        return static::create([
            'id' => $id,
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'type' => $type,
            'required' => $required,
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $variants)),
            'is_range' => $isRange ?? false,
            'sort' => Characteristic::count() + 1,
            'icon' => $iconName,
        ]);
    }

    public function edit(string $nameUz, string $nameRu, string $nameEn, string $type, bool $required, ?string $variants, ?string $isRange, string $iconName = null): void
    {
        $this->update([
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'type' => $type,
            'required' => $required,
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $variants)),
            'is_range' => $isRange ?? false,
            'icon' => $iconName ?: $this->icon,
        ]);
    }

    public static function typesList(): array
    {
        return [
            self::TYPE_STRING => 'String',
            self::TYPE_INTEGER => 'Integer',
            self::TYPE_FLOAT => 'Float',
        ];
    }

    public function typeName(): string
    {
        return self::typesList()[$this->type];
    }

    public function isString(): bool
    {
        return $this->type === self::TYPE_STRING;
    }

    public function isInteger(): bool
    {
        return $this->type === self::TYPE_INTEGER;
    }

    public function isFloat(): bool
    {
        return $this->type === self::TYPE_FLOAT;
    }

    public function isNumber(): bool
    {
        return $this->isInteger() || $this->isFloat();
    }

    public function isSelect(): bool
    {
        return \count($this->variants) > 0;
    }

    public function isRange(): bool
    {
        return $this->is_range;
    }

    public function isIdEqualTo(int $characteristicId): bool
    {
        return $this->id === $characteristicId;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getIconThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_CHARACTERISTICS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->icon;
    }

    public function getIconOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_CHARACTERISTICS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->icon;
    }

    ###########################################


    ########################################### Relations

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    ###########################################
}
