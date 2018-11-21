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


    //首页文章栏目
    public function article(){
        //dd(1);
       
        $article=Article::get();

        foreach ($article as $k=>$row){
            $rows[$k]['id']=$row->id;
            $rows[$k]['title']=$row->title;
            $rows[$k]['content']=$row->content;
            $rows[$k]['admin_id']=$row->admin_id;
           
            $rows[$k]['thumb']=explode(',',$row->thumb);
            //var_dump($row['thumb']);
        }
       //dd($rows);
       
         return view("Home.Home.article",['rows'=>$rows]);
    }
    
    //首页文章栏目详情
    public function articles($id){
        $info=Article::where('id','=',$id)->first();
        
        $info->thumb=explode(',',$info->thumb);

        
        return view("Home.Home.articles",['info'=>$info]);
    }



    /**
     * 
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $cate = $this->getCategoryBypid(0);

       

        


        view()->share('cate',$cate);
 
        // 友情链接
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
