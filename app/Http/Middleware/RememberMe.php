<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class RememberMe
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('remember')) {
            $rememberToken = Str::random(60); 
            $request->user()->forceFill([
                'remember_token' => hash('sha256', $rememberToken),
            ])->save();

            $response = $next($request);

            return $response->withCookie(cookie()->forever('remember_token', $rememberToken));
        }

        return $next($request);
    }
}
