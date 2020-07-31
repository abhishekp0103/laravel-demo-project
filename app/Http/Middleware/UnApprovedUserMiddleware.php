<?php

namespace App\Http\Middleware;

use Closure;

class UnApprovedUserMiddleware
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
        if ($user->is_admin === "Y" || $user->is_approved === "Y") {
            // return "Admin has not approved you yet.";
            abort(404, 'Unauthorized User action.');
        }
        return $next($request);
    }
}