<?php
declare(strict_types=1);

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

/**
 * Справочник Сотрудники. Группы доступов
 */
class ArmPermissionGroup extends Model
{
    protected $table = 'arm_permission_groups';
}
