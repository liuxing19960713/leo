<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{

    
    
    
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getsear($id){
        // dd($id);
        $data=DB::table("category")->where('path','like',"0,$id")->get();
        $ids='';
        foreach($data as $value)
        {
            $ids.=$value->id.',';

        }
        $ids=$ids.$id;
        // dd($ids);
        $sear=DB::select("SELECT * FROM goods WHERE `status`=1 and cate_id in({$ids})");
        // dd($sear);
        return $sear;

    }

    public function index()
    {

        
        $wheel=$this->wheel();
        $link=$this->link();
        // dd(111);
        $info=DB::table('goods')->where('status','=',1)->get();
        $sear=$this->getsear(7);
        // dd($info);
        // dd($sear);
        //首页方法

        return view("Home.Home.index",['sear'=>$sear,'info'=>$info,'wheel'=>$wheel]);


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
