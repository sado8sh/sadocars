<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

