<?php

namespace App\Entity\Projects\Project;

use App\Entity\Projects\Developer;
use App\Entity\Projects\Project\Dialog\Dialog;
use App\Entity\Projects\Category;
use App\Entity\Region;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $developer_id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $about_uz
 * @property string $about_ru
 * @property string $about_en
 * @property int $category_id
 * @property int $region_id
 * @property int $price
 * @property int $impressions
 * @property int $clicks
 * @property int $leads
 * @property string $address_uz
 * @property string $address_ru
 * @property string $address_en
 * @property string $landmark_uz
 * @property string $landmark_ru
 * @property string $landmark_en
 * @property string $lng
 * @property string $ltd
 * @property int $status
 * @property string $reject_reason
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property Carbon $expires_at
 *
 * @property Developer $developer
 * @property Region $region
 * @property Category $category
 * @property Value[] $values
 * @property Photo[] $photos
 *
 * @property string $name
 * @property string $about
 * @property string $address
 * @property string $landmark
 * @method Builder active()
 * @method Builder forUser(User $user)
 * @mixin Eloquent
 */
class Project extends Model
{
    public const STATUS_DRAFT = 1;
    public const STATUS_MODERATION = 2;
    public const STATUS_ACTIVE = 5;
    public const STATUS_CLOSED = 6;

    protected $table = 'project_projects';

    protected $guarded = ['id'];

    protected $fillable = [
        'developer_id', 'name_uz', 'name_ru', 'name_en', 'about_uz', 'about_ru', 'about_en', 'address_uz', 'price',
        'category_id', 'region_id', 'impressions', 'clicks', 'leads', 'address_ru', 'address_en', 'landmark_uz',
        'landmark_ru', 'landmark_en', 'lng', 'ltd', 'status', 'reject_reason', 'published_at', 'expires_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public static function statusesList(): array
    {
        return [
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_MODERATION => 'On Moderation',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_CLOSED => 'Closed',
        ];
    }

    public function sendToModeration(): void
    {
        if (!$this->isDraft()) {
            throw new \DomainException('Project is not draft.');
        }
        if (!\count($this->photos)) {
            throw new \DomainException('Upload photos.');
        }
        $this->update([
            'status' => self::STATUS_MODERATION,
        ]);
    }

    public function moderate(Carbon $date): void
    {
        if ($this->status !== self::STATUS_MODERATION) {
            throw new \DomainException('Project is not sent to moderation.');
        }
        $this->update([
            'published_at' => $date,
            'expires_at' => $date->copy()->addDays(15),
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function reject($reason): void
    {
        $this->update([
            'status' => self::STATUS_DRAFT,
            'reject_reason' => $reason,
        ]);
    }

    public function expire(): void
    {
        $this->update([
            'status' => self::STATUS_CLOSED,
        ]);
    }

    public function close(): void
    {
        $this->update([
            'status' => self::STATUS_CLOSED,
        ]);
    }

    public function writeClientMessage(int $fromId, string $message): void
    {
        $this->getOrCreateDialogWith($fromId)->writeMessageByClient($fromId, $message);
    }

    public function writeOwnerMessage(int $toId, string $message): void
    {
        $this->getDialogWith($toId)->writeMessageByOwner($this->user_id, $message);
    }

    public function readClientMessages(int $userId): void
    {
        $this->getDialogWith($userId)->readByClient();
    }

    public function readOwnerMessages(int $userId): void
    {
        $this->getDialogWith($userId)->readByOwner();
    }

    private function getDialogWith(int $userId): Dialog
    {
        $dialog = $this->dialogs()->where([
            'user_id' => $this->user_id,
            'client_id' => $userId,
        ])->first();
        if (!$dialog) {
            throw new \DomainException('Dialog is not found.');
        }
        return $dialog;
    }

    private function getOrCreateDialogWith(int $userId): Dialog
    {
        if ($userId === $this->user_id) {
            throw new \DomainException('Cannot send message to myself.');
        }
        return $this->dialogs()->firstOrCreate([
            'user_id' => $this->user_id,
            'client_id' => $userId,
        ]);
    }

    public function getValue($id): ?string
    {
        foreach ($this->values as $value) {
            if ($value->characteristic_id === $id) {
                return $value->value;
            }
        }
        return null;
    }

    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isOnModeration(): bool
    {
        return $this->status === self::STATUS_MODERATION;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isClosed(): bool
    {
        return $this->status === self::STATUS_CLOSED;
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


    ########################################### Scopes

    public function scopeActive(Builder $query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeForUser(Builder $query, User $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function scopeForCategory(Builder $query, Category $category)
    {
        return $query->whereIn('category_id', array_merge(
            [$category->id],
            $category->descendants()->pluck('id')->toArray()
        ));
    }

    public function scopeForRegion(Builder $query, Region $region)
    {
        $ids = [$region->id];
        $childrenIds = $ids;
        while ($childrenIds = Region::where(['parent_id' => $childrenIds])->pluck('id')->toArray()) {
            $ids = array_merge($ids, $childrenIds);
        }
        return $query->whereIn('region_id', $ids);
    }

    public function scopeFavoredByUser(Builder $query, User $user)
    {
        return $query->whereHas('favorites', function(Builder $query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    ###########################################


    ########################################### Relations

    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'project_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'project_id', 'id');
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'project_favorites', 'project_id', 'user_id');
    }

    public function dialogs()
    {
        return $this->hasMany(Dialog::class, 'project_id', 'id');
    }

    ###########################################
}
