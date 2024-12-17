<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$status): Response
    {
        if(auth()->user() && in_array(auth()->user()->status, $status)) {
            return $next($request);
        }
        echo "<script>alert('Your account is listed as inactive, please confirm or contact admin')</script>";
        echo "<script>window.location = '/'</script>";
    }
}
