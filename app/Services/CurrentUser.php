<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Models\UserRefreshToken;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;

/**
 * Класс предназначен для получения текущего пользователя (таблица employees), синглтон
 */
class CurrentUser
{
    private static User $user;

    const string REFRESH_IS_TOKEN_EXPIRED = 'Refresh is token expired';

    public static function getByEmail(string $email): ?User
    {
        if (empty(self::$user)) {
            self::$user = User::where('email', $email)->first();
        }

        return self::$user;
    }

    /**
     * @throws AuthenticationException
     */
    public static function getByRefreshToken(string $refreshToken): ?User
    {
        if (empty(self::$user)) {
            $refreshToken = UserRefreshToken::where('refresh_token', $refreshToken)->firstOrFail();
            if (Carbon::parse($refreshToken->expired_at)->lt(Carbon::now())) {
                throw new AuthenticationException(self::REFRESH_IS_TOKEN_EXPIRED);
            }

            self::$user = $refreshToken->user;
        }

        return self::$user;
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }
}
