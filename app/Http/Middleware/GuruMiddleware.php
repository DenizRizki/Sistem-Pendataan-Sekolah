<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuruMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $role = auth()->user()->role;

        // Admin route
        if ($role === 'admin') {
            return $next($request);
        }

        // Guru
        if ($role === 'guru') {

            if ($request->is('admin/users*')) {
                abort(403, 'Guru tidak diizinkan mengakses User Management');
            }

            return $next($request);
        }

        abort(403, 'Akses ditolak');
    }
}
