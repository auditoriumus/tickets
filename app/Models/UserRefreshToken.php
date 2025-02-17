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
 * @property-read User|null $user
 * @method static Builder<static>|UserRefreshToken newModelQuery()
 * @method static Builder<static>|UserRefreshToken newQuery()
 * @method static Builder<static>|UserRefreshToken query()
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
