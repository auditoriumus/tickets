<?php

namespace App\Models;

use App\Models\Catalogs\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $employee_id
 * @property string|null $refresh_token
 * @property string|null $expired_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee|null $employee
 * @method static Builder<static>|EmployeeRefreshToken newModelQuery()
 * @method static Builder<static>|EmployeeRefreshToken newQuery()
 * @method static Builder<static>|EmployeeRefreshToken query()
 * @method static Builder<static>|EmployeeRefreshToken whereCreatedAt($value)
 * @method static Builder<static>|EmployeeRefreshToken whereEmployeeId($value)
 * @method static Builder<static>|EmployeeRefreshToken whereExpiredAt($value)
 * @method static Builder<static>|EmployeeRefreshToken whereId($value)
 * @method static Builder<static>|EmployeeRefreshToken whereRefreshToken($value)
 * @method static Builder<static>|EmployeeRefreshToken whereUpdatedAt($value)
 * @method static where(string $string, string $email)
 * @method firstOrFail()
 */
class EmployeeRefreshToken extends Model
{
    const int REFRESH_TOKEN_AVAILABLE_MINUTES = 60;
    protected $table = 'employee_refresh_token';

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class,'id','employee_id');
    }
}
