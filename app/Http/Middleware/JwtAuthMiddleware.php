<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\JwtServices\JwtParser;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtAuthMiddleware
{
    const string AUTHORIZATION_IS_REQUIRED = 'Authorization is required';

    public function handle(Request $request, Closure $next): Response
    {
       $jwt = $request->bearerToken();

       if (empty($jwt)) {
           return response(['message' => self::AUTHORIZATION_IS_REQUIRED], 401);
       }

       try {
           (new JwtParser(config('jwt.employee_jwt_secret'), $jwt))->parseJwtToken();
       } catch (AuthenticationException $e) {
           return response(['message' => $e->getMessage()], 401);
       }

        return $next($request);
    }
}
