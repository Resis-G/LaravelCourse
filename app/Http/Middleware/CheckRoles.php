<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles=array_slice(func_get_args(),2);
   
        
     
            if(auth()->user()->hasRoles($roles) ){
                return $next($request);
            }
    
        
        return redirect()->route('home');      
    }
}
