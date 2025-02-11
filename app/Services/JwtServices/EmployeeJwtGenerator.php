<?php
declare(strict_types=1);

namespace App\Services\JwtServices;

use App\Models\Catalogs\Employee;

class EmployeeJwtGenerator extends JwtGenerator
{
    const string EXPIRATION = '15 minutes';

    public function __construct(Employee $employee)
    {
        parent::__construct(
            config('jwt.employee_jwt_secret'),
            [
                'name'  => $employee->name,
                'email' => $employee->email,
                'phone' => $employee->phone,
            ],
            self::EXPIRATION
        );
    }
}
