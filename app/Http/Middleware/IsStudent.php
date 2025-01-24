<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class IsStudent
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $token = $request->bearerToken();

    if (!$token) {
      return response()->json([
        'error' => 'token_not_found',
        'message' => 'Token Not Found'
      ], 401);
    }

    try {
      $user = JWTAuth::parseToken()->authenticate();
    } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
      return response()->json([
        'error' => 'token_expired',
        'message' => 'Token Expired'
      ], 401);
    } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
      return response()->json([
        'error' => 'token_invalid',
        'message' => 'Token Invalid'
      ], 401);
    } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
      return response()->json([
        'error' => 'token_absent',
        'message' => 'Token Absent'
      ], 401);
    }

    if ($user->role !== 'student') {
      return response()->json([
        'error' => 'user_unauthorized',
        'message' => 'Unauthorized Role'
      ], 401);
    }

    return $next($request);
  }
}
