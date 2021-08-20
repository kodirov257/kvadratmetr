<?php

namespace App\Entity\Projects;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $type
 * @property string $default
 * @property boolean $required
 * @property array $variants
 * @property boolean $is_range
 * @property integer $sort
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $name
 * @property User $createdBy
 * @property User $updatedBy
 */
class Characteristic extends BaseModel
{
    public const TYPE_STRING = 'string';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_FLOAT = 'float';

    protected $table = 'project_characteristics';

    public $timestamps = false;

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'type', 'required', 'default', 'variants', 'is_range', 'sort'];

    protected $casts = [
        'variants' => 'array',
    ];

    public static function typesList(): array
    {
        return [
            self::TYPE_STRING => 'String',
            self::TYPE_INTEGER => 'Integer',
            self::TYPE_FLOAT => 'Float',
        ];
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


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
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
