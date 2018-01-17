<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ApplicantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard('applicant')->check() && Auth::guard('applicant')->user()->user_role2->role_id == '6')
        {
            return $next($request);
        }
        
        return redirect('account/login');
    }
}
