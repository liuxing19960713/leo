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
            $ids[]=$value->id;

        }
        $ids[]=$id;
        
        $sear=DB::table('goods') ->whereIn('cate_id',$ids) ->paginate(8);
        // dd($sear);
        return $sear;

    }

    public function index(Request $request)
    {


        $wheel=$this->wheel();

        // dd(111);
        $info=DB::table('goods')->where('status','=',1)->get();
        $sear=$this->getsear(7);
        // var_dump($request->input('id'));       // dd($info);
        // dd($wheel);
        
        //首页方法

        return view("Home.Home.index",['sear'=>$sear,'info'=>$info,'wheel'=>$wheel]);


    }
    //前台商品详情模态框
    public function modal(Request $request)
    {
        $id = $request->input('id');
        $info=DB::table('goods')->where('id','=',$id)->first();
        //以下是详情信息获取方法
        // $arr    = $info->pic;
        $info->pic = explode(',',$info->pic);
        // dd($info);exit;
        // foreach ($pic as $key => $value) 
        // }
        // $data=DB::table('goods')->where('cate_id','=',$info->cate_id)->get();
        return json_encode($info);
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
    //商品详情页
    public function goodinfo(Request $request,$id)
    {
        $info=DB::table('goods')->where('id','=',$id)->first();
        //以下是详情信息获取方法
        $arr    = $info->pic;
        $pic['pic']    = explode(',',$arr);
        foreach ($pic as $key => $value) {
        }
        $data=DB::table('goods')->where('cate_id','=',$info->cate_id)->get();
        // dd($data);
        // $value = '/static/uploads/goods/'.$value;
        // dd($value);

        return view("Home.Home.goodinfo",['info'=>$info,'pic'=>$value,'data'=>$data]);
    }
    //商品列表页
    public function search(Request $request,$id)
    {
        // dd($id);
        $search=$this->getsear($id);
        // dd($search);

        return view("Home.Home.search",['search'=>$search]);
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
