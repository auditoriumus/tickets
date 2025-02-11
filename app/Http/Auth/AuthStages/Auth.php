<?php
declare(strict_types=1);

namespace App\Http\Auth\AuthStages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

abstract class Auth
{
    protected Auth $next;
    protected bool $isAuth = false;

    public function setNextHandler(Auth $next): Auth
    {
        $this->next = $next;

        return $next;
    }

    public function handle(Request $request): bool
    {
        return $this->handleNext($request);
    }

    public function handleNext(Request $request): bool
    {
        if (empty($this->next)) {
            $this->isAuth = true;
            return true;
        } else {
            return $this->next->handle($request);
        }
    }

    public function __destruct()
    {
        //если попытка входа удалась, очищаем количество неудачных попыток
        if ($this->isAuth) {
            Cache::delete((new MaxAttempts())->getCacheKey());
        }
    }
}
