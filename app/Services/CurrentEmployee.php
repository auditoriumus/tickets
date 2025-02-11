<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Catalogs\Employee;
use App\Models\EmployeeRefreshToken;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;

/**
 * Класс предназначен для получения текущего пользователя (таблица employees), синглтон
 */
class CurrentEmployee
{
    private static Employee $employee;

    const string REFRESH_IS_TOKEN_EXPIRED = 'Refresh is token expired';

    public static function getByEmail(string $email): ?Employee
    {
        if (empty(self::$employee)) {
            self::$employee = Employee::where('email', $email)->first();
        }

        return self::$employee;
    }

    public static function getByRefreshToken(string $refreshToken): ?Employee
    {
        if (empty(self::$employee)) {
            $refreshToken = EmployeeRefreshToken::where('refresh_token', $refreshToken)->firstOrFail();
            if (Carbon::parse($refreshToken->expired_at)->lt(Carbon::now())) {
                throw new AuthenticationException(self::REFRESH_IS_TOKEN_EXPIRED);
            }

            self::$employee = $refreshToken->employee;
        }

        return self::$employee;
    }

    private function __construct()
    {

    }
    private function __clone()
    {

    }
}
