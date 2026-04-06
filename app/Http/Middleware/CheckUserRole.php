<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Ensure the user is logged in
        if (!Auth::check()) {
            return redirect('/login');
        }

        $role = Auth::user()->role;

        // 2. If a Superadmin tries to access a regular user page, redirect them to the admin panel
        if ($role === 'superadmin') {
            return redirect()->route('admin.dashboard');
        }

        // 3. If it is a standard User, allow them to proceed to the page
        if ($role === 'user') {
            return $next($request);
        }

        // 4. Fallback: If the role is blank or anything else, deny access entirely
        abort(403, 'Unauthorized action. You do not have the correct permissions.');
    }
}