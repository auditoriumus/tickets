<?php
declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property int $region_id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Region $region
 * @method static Builder<static>|Districts newModelQuery()
 * @method static Builder<static>|Districts newQuery()
 * @method static Builder<static>|Districts onlyTrashed()
 * @method static Builder<static>|Districts query()
 * @method static Builder<static>|Districts whereCreatedAt($value)
 * @method static Builder<static>|Districts whereDeletedAt($value)
 * @method static Builder<static>|Districts whereId($value)
 * @method static Builder<static>|Districts whereNameRu($value)
 * @method static Builder<static>|Districts whereNameUz($value)
 * @method static Builder<static>|Districts whereRegionId($value)
 * @method static Builder<static>|Districts whereUpdatedAt($value)
 * @method static Builder<static>|Districts withTrashed()
 * @method static Builder<static>|Districts withoutTrashed()
 * @mixin Eloquent
 */
class Districts extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'region_id',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
