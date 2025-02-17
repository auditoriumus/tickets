<?php
declare(strict_types=1);

namespace App\Http\Auth\AuthStages;

use App\Services\CurrentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class CheckPassword extends Auth
{
    const array ERROR_MESSAGES = ['Password is wrong.'];

    public function handle(Request $request): bool
    {
        $passwordCheck = Hash::check(
            $request->input('password'),
            (CurrentUser::getByEmail($request->input('email')))->password
        );

        if (!$passwordCheck) {
            throw ValidationException::withMessages(self::ERROR_MESSAGES);
        }

        return $this->handleNext($request);
    }
}
