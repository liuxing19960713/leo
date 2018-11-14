<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    public function getCategoryBypid($pid)
    {
        $s=DB::table("category")->where("pid",'=',$pid)->get();
        //遍历
        $data=[];
        foreach($s as $key=>$value){
            $value->dev=$this->getCategoryBypid($value->id);
            $data[]=$value;
        }
        return $data;
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $cate = $this->getCategoryBypid(0);
        view()->share('cate',$cate);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
