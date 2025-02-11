<?php
declare(strict_types=1);

namespace App\Http\Auth\AuthStages;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class ExpirationDate extends Auth
{
    const array ERROR_MESSAGES = ['Expired date.'];

    public function handle(Request $request): bool
    {
        $expirationDate = DB::table('employees')
            ->where('email', $request->input('email'))
            ->firstOrFail()
            ->expiration_date;

        if (!empty($expirationDate) && Carbon::parse($expirationDate)->lt(Carbon::now())) {
            throw ValidationException::withMessages(self::ERROR_MESSAGES);
        }

        return $this->handleNext($request);
    }
}
