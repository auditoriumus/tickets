<?php
declare(strict_types=1);

namespace App\Http\Auth\AuthStages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

final class MaxAttempts extends Auth
{
    const int MAX_ATTEMPTS       = 5;
    const int TIME_BREAK_MINUTES = 1;
    const array ERROR_MESSAGES   = ['Attempt limit exceeded. Try again in ' . self::TIME_BREAK_MINUTES . ' minutes'];
    private string $cacheKey;

    public function handle(Request $request): bool
    {
        $currentAttempt = (int)Cache::get($this->getCacheKey()) + 1;

        if ($currentAttempt > self::MAX_ATTEMPTS) {
            throw ValidationException::withMessages(self::ERROR_MESSAGES);
        }

        Cache::put($this->getCacheKey(), $currentAttempt, self::TIME_BREAK_MINUTES * 60);

        return $this->handleNext($request);
    }

    public function getCacheKey(): string
    {
        if (empty($this->cacheKey)) {
            $this->cacheKey = 'login_' . request()->input('email') . '_' . request()->ip();
        }

        return $this->cacheKey;
    }
}
