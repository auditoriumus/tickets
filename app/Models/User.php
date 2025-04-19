<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property-read \App\Models\UserRefreshToken|null $refreshToken
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User onlyTrashed()
 * @method static Builder<static>|User query()
 * @method static Builder<static>|User withTrashed()
 * @method static Builder<static>|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Model
{
    use SoftDeletes;

    protected $table = 'employees';

    protected $guarded = ['id'];

    public function refreshToken(): HasOne
    {
        return $this->hasOne(UserRefreshToken::class,'employee_id','id');
    }
}
