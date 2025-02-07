<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    

        
        //return $next($request);
   

    public function handle(Request $request, Closure $next,...$userType): Response
    {

       /* if (Gate::denies($permission)) {
              abort(403, 'Unauthorized action.');
        } return $next($request);*/

        if (!in_array($request->user()->userType, $userType)) {
            abort(403, 'Unauthorized action.'); // Redirect if the role doesn't match
        }

        return $next($request);
    }
}
