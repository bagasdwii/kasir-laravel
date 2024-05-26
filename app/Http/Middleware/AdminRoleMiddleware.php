<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna memiliki peran 'admin'
        if ($request->user() && $request->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
