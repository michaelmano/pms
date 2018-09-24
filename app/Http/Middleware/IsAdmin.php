<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user) {
            if ($user->hasRole('admin') || $user->hasRole('root')) {
                return $next($request);
            }
        }

        return response([
            'message' => 'Unauthorized.',
        ], 401);
    }
}
