<?php
declare(strict_types=1);

namespace App\Models\Catalogs;

use App\Models\EmployeeRefreshToken;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $password
 * @property string $password_expired_at
 * @property string|null $remember_token
 * @property string|null $two_factor_secret
 * @property int|null $two_factor_passed
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $previous_passwords предыдущие использованные паролей
 * @property string|null $description
 * @property string|null $password_updated_at
 * @property string|null $authenticated_at
 * @property string $date_format
 * @property-read EmployeeRefreshToken|null $refreshToken
 * @method static Builder<static>|Employee newModelQuery()
 * @method static Builder<static>|Employee newQuery()
 * @method static Builder<static>|Employee onlyTrashed()
 * @method static Builder<static>|Employee query()
 * @method static Builder<static>|Employee whereAuthenticatedAt($value)
 * @method static Builder<static>|Employee whereCreatedAt($value)
 * @method static Builder<static>|Employee whereDateFormat($value)
 * @method static Builder<static>|Employee whereDeletedAt($value)
 * @method static Builder<static>|Employee whereDescription($value)
 * @method static Builder<static>|Employee whereEmail($value)
 * @method static Builder<static>|Employee whereId($value)
 * @method static Builder<static>|Employee whereName($value)
 * @method static Builder<static>|Employee wherePassword($value)
 * @method static Builder<static>|Employee wherePasswordExpiredAt($value)
 * @method static Builder<static>|Employee wherePasswordUpdatedAt($value)
 * @method static Builder<static>|Employee wherePhone($value)
 * @method static Builder<static>|Employee wherePreviousPasswords($value)
 * @method static Builder<static>|Employee whereRememberToken($value)
 * @method static Builder<static>|Employee whereTwoFactorPassed($value)
 * @method static Builder<static>|Employee whereTwoFactorSecret($value)
 * @method static Builder<static>|Employee whereUpdatedAt($value)
 * @method static Builder<static>|Employee withTrashed()
 * @method static Builder<static>|Employee withoutTrashed()
 * @method static create(array $data)
 * @method static paginate(int $paginate)
 * @method static findOrFail(string $id)
 * @mixin Eloquent
 */
class Employee extends Model
{
    use SoftDeletes;

    protected $table = 'employees';

    protected $guarded = ['id'];

    public function refreshToken(): HasOne
    {
        return $this->hasOne(EmployeeRefreshToken::class,'employee_id','id');
    }
}
