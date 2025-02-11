<?php
declare(strict_types=1);

namespace App\Http\Auth;

use App\Http\Auth\AuthStages\CheckPassword;
use App\Http\Auth\AuthStages\ExpirationDate;
use App\Http\Auth\AuthStages\MaxAttempts;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RefreshJwtRequest;
use App\Models\Catalogs\Employee;
use App\Models\EmployeeRefreshToken;
use App\Services\CurrentEmployee;
use App\Services\JwtServices\EmployeeJwtGenerator;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Random\RandomException;
use Throwable;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $loginHandler = new MaxAttempts();
        $loginHandler->setNextHandler(new ExpirationDate());
        $loginHandler->setNextHandler(new CheckPassword());
        $loginHandler->handle($request);

        $employee = CurrentEmployee::getByEmail($request->email);
        try {
            return response()->json($this->generateTokens($employee));
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function refresh(RefreshJwtRequest $request): JsonResponse
    {
        try {
            $employee = CurrentEmployee::getByRefreshToken($request->refreshToken);
            return response()->json($this->generateTokens($employee));
        } catch (AuthenticationException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        } catch (RandomException $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * @throws RandomException
     * @return array<string, mixed>
     */
    private function generateTokens(Employee $employee): array
    {
        return [
            'accessToken'  => (new EmployeeJwtGenerator($employee))->issueJwtToken(),
            'refreshToken' => $this->updateRefreshToken($employee),
        ];
    }

    /**
     * @param Employee $employee
     * @return string
     * @throws RandomException
     */
    private function updateRefreshToken(Employee $employee): string
    {
        $token = $this->generateRefreshToken();

        EmployeeRefreshToken::updateOrInsert([
            'employee_id'   => $employee->id
        ], [
            'refresh_token' => $token,
            'expired_at'    => Carbon::now()->addMinutes(EmployeeRefreshToken::REFRESH_TOKEN_AVAILABLE_MINUTES),
            'updated_at'    => Carbon::now()
        ]);

        return $token;
    }

    /**
     * @throws RandomException
     */
    private function generateRefreshToken(): string
    {
        return hash('sha256', random_bytes(32) . microtime(true));
    }
}
