<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LivewireGuardCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        // Check for student route and set guard to 'student'
        if ($request->is('student/*')) {
            Auth::shouldUse('student');
        }
        // Check for admin route and set guard to 'web'
        elseif ($request->is('admin/*')) {
            Auth::shouldUse('web');
        }
        // Check for teacher route and set guard to 'teacher'
        elseif ($request->is('teacher/*')) {
            Auth::shouldUse('teacher');
        }
        // Check for parent route and set guard to 'parent'
        elseif ($request->is('parent/*')) {
            Auth::shouldUse('parent');
        }
    
            return $next($request);
    }
}
