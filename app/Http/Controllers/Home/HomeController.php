<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //遍历分类栏目方法
    public function getCategoryBypid($pid){
        $s=DB::table("category")->where("pid",'=',$pid)->get();
        //遍历
        $data=[];
        foreach($s as $key=>$value){
            $value->dev=$this->getCategoryBypid($value->id);
            $data[]=$value;
        }
        return $data;
    }
    
    
    //首页轮播图方法
    public function wheel(){
        $w=DB::table("wheel")->get();
        return $w;
    }

    //首页友情链接方法
    public function link(){
        $link=DB::table("link")->get();
        //dd(count($link));
        return $link;
    }
    public function index()
    {
        $cate=$this->getCategoryBypid(0);
        
        $wheel=$this->wheel();
        $link=$this->link();
        //dd($cate);
        //首页方法
        return view("Home.Home.index",['cate'=>$cate,'wheel'=>$wheel,'link'=>$link]);
       
        
    }
    //首页文章栏目
    public function article(){
        //dd(1);
        $article=DB::table("article")->get();
         return view("Home.Home.article",['article'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
