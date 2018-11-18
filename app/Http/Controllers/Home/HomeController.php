<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入模型类Administrator
use App\Model\Article;
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
    // 遍历客厅的方法 搜索方法
    public function getsear($id){

        
       

        // dd($id);
        $data=DB::table("category")->where('path','like',"0,$id")->paginate(12);

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


        // 轮播图
        $wheel=$this->wheel();

      


        


        // dd(111);
        $info=DB::table('goods')->where('status','=',1)->get();
        // 
        $sear=$this->getsear(7);
        // dd($info);
        // dd($wheel);
        //首页方法
<<<<<<< HEAD
        // dd(session());
=======

        


>>>>>>> c542a2309a35e5afe408e7afa8faa8aaf9c6ec87
        return view("Home.Home.index",['sear'=>$sear,'info'=>$info,'wheel'=>$wheel]);



    }
    //首页文章栏目
    public function article(){
  
        //连表查询获取添加者名字
        $article=DB::table('article')->join('admin','admin.id','admin_id')->select('article.*','admin.name')->paginate(9);
        // dd($article);
        foreach ($article as $k=>$row){
            $rows[$k]['id']=$row->id;
            $rows[$k]['title']=$row->title;
            $rows[$k]['head']=$row->head;
            $rows[$k]['content']=$row->content;
            //将添加者名字存入数组
            $rows[$k]['name']=$row->name;
            $rows[$k]['admin_id']=$row->admin_id;
            $rows[$k]['status']=$row->status;
            //将多张图片分离,第一张图片作为封面图
            $rows[$k]['thumb']=explode(',',$row->thumb);
            
        }
        //dd($rows);
      
         return view("Home.Home.article",['rows'=>$rows,'article'=>$article]);
    }
    //首页文章栏目详情
    public function articles($id){
        $info=Article::where('id','=',$id)->first();
        //分离多张图片
        //$info->thumb=explode(',',$info->thumb);

        
        return view("Home.Home.articles",['info'=>$info]);
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
