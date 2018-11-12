<?php

namespace App\Http\Middleware;

use Closure;

class AdminloginMiddleware
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
         //检测用户是否具有登录的session
        if ($request->session()->has('name')) {
            return $next($request);
        } else {
            //跳转到登录页
            return redirect("/adminlogin");
        }
    }
}
