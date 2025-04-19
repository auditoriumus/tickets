<?php
declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $refresh_token
 * @property string|null $expired_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static Builder<static>|UserRefreshToken newModelQuery()
 * @method static Builder<static>|UserRefreshToken newQuery()
 * @method static Builder<static>|UserRefreshToken query()
 * @method static Builder<static>|UserRefreshToken whereCreatedAt($value)
 * @method static Builder<static>|UserRefreshToken whereExpiredAt($value)
 * @method static Builder<static>|UserRefreshToken whereId($value)
 * @method static Builder<static>|UserRefreshToken whereRefreshToken($value)
 * @method static Builder<static>|UserRefreshToken whereUpdatedAt($value)
 * @method static Builder<static>|UserRefreshToken whereUserId($value)
 * @mixin Eloquent
 */
class UserRefreshToken extends Model
{
    const int REFRESH_TOKEN_AVAILABLE_MINUTES = 60;
    protected $table = 'user_refresh_token';

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','employee_id');
    }
}
