<?php
declare(strict_types=1);

namespace App\Services\JwtServices;

use App\Models\User;

class EmployeeJwtGenerator extends JwtGenerator
{
    const string EXPIRATION = '15 minutes';

    public function __construct(User $employee)
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
