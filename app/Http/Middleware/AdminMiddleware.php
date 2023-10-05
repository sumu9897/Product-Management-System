<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth:: check()){
            if(Auth::user()->role_as =='admin'){
                return $next($request);
            }
            else{
                return redirect('/login') ->with('status',"Access Denied! as you are not as Admin");
            }
        }
        else{
            return redirect('/login') ->with ('status','Please Lohin First');
        }
    }
}
