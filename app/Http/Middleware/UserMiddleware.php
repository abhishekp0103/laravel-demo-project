<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if ($user->is_admin === "Y" || $user->is_approved === "N") {
            // return "Admin has approved you already";
            abort(403, 'Unauthorized User action.');
        }
        return $next($request);
    }
}
