<?php
declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Districts> $districts
 * @property-read int|null $districts_count
 * @method static Builder<static>|Region newModelQuery()
 * @method static Builder<static>|Region newQuery()
 * @method static Builder<static>|Region onlyTrashed()
 * @method static Builder<static>|Region query()
 * @method static Builder<static>|Region whereCreatedAt($value)
 * @method static Builder<static>|Region whereDeletedAt($value)
 * @method static Builder<static>|Region whereId($value)
 * @method static Builder<static>|Region whereNameRu($value)
 * @method static Builder<static>|Region whereNameUz($value)
 * @method static Builder<static>|Region whereUpdatedAt($value)
 * @method static Builder<static>|Region withTrashed()
 * @method static Builder<static>|Region withoutTrashed()
 * @mixin Eloquent
 */
class Region extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function districts(): HasMany
    {
        return $this->hasMany(Districts::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true)->where('region_name', Region::MOSCOW);
    }
}
