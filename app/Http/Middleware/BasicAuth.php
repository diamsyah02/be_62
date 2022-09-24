<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\ApiResponse;

class BasicAuth
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->header('authorization') != env('KEY_AUTHORIZATION')) {
            return response()->json([
                'statusCode'    => 401,
                'message'       => 'Opss.. Unauthorized (token invalid)',
            ], 401);
        }
        return $next($request);
    }
}