<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 前置中间件

        if ($request->input('token') != 'my-secret-token') {
            return redirect('home');
        }

        $response = $next($request);

        // 后置中间件
        // Perform action

        return $response;
    }
}
