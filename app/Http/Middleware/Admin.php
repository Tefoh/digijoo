<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $role = auth()->user()->role()->first();
        abort_if($role == null || $role->name != 'admin', 403, 'اجازه دسترسی ندارید');

        return $next($request);
    }
}
