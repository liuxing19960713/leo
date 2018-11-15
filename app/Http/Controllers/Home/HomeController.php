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
        // dd(111);
        $info=DB::table('goods')->where('status','=',1)->get();
        $sear=$this->getsear(7);
        // dd($info);
        // dd($sear);
        //首页方法
        return view("Home.Home.index",['sear'=>$sear,'info'=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //商品详情页
    public function goodinfo(Request $request,$id)
    {
        $info=DB::table('goods')->where('id','=',$id)->first();
        //以下是详情信息获取方法
        $arr    = $info->pic;
        $pic['pic']    = explode(',',$arr);
        foreach ($pic as $key => $value) {
        }
        // dd($value);
        // $value = '/static/uploads/goods/'.$value;
        // dd($value); 
        
       

        return view("Home.Home.goodinfo",['info'=>$info,'pic'=>$value]);
    }
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
