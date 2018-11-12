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
              //获取访问控制器的方法
            //获取访问模块方法名
             $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
            //控制器名
            $controllerName=$func[0];
            //方法
            $actionName=$func[1];
            // echo $controllerName.":".$actionName;
            //4.权限对比
            //获取登录用户的权限信息
            $nodelist=session('nodelist');

            // dd($nodelist);
            // if(empty($nodelist[$controllerName]) ||!in_array($actionName,$nodelist[$controllerName])){
                // return redirect("/admin")->with('error','抱歉,您没有权限访问该模块,请联系刘兴');
            // }
            return $next($request);
        } else {
            //跳转到登录页
            return redirect("/adminlogin");
        }
    }
}
