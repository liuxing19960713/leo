<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    // 无限分类方法
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

     //首页友情链接方法
    public function link(){
        $link=DB::table("link")->get();
        //dd(count($link));
        return $link;
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

         $link=$this->link();
        view()->share('link',$link);


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
