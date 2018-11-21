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
        dd($request->all());
        $info=DB::table('goods')->where('id','=',$id)->first();
        //以下是详情信息获取方法
        $arr    = $info->pic;
        $pic['pic']    = explode(',',$arr);
        foreach ($pic as $key => $value) {
        }
        $data=DB::table('goods')->where('cate_id','=',$info->cate_id)->get();
        // dd(session('hid'));
        $id     = session('hid');
        $uname  = DB::table('user')->where("id","=",$id)->value('uname');//用户信息
        // $value = '/static/uploads/goods/'.$value;
         
        //评论总数
        $comnum = DB::table('comment')->count();
        return view("Home.Home.goodinfo",['info'=>$info,'pic'=>$value,'data'=>$data,'comnum'=>$comnum,'uname'=>$uname]);

    }
    //商品列表页
    public function search(Request $request,$id)
    {
         //dd($id);
        $search=$this->getsear($id);
        // dd($search);

        return view("Home.Home.search",['search'=>$search]);

    }
  
    public function create(Request $request)
    {

    }

    /**
     * 评论添加
     * @author 刘兴
     * @DateTime 2018-11-19T20:09:21+0800
     * @param    string                   $value [description]
     * @return   [type]                          [description]
     */
    public function hcomment(Request $request)
    {

        $data           = $request->except(['_token']);
        dd($data);
        // $data['uid']    = session('hid');
        // $data['addtime']= time();
        // if(DB::table('comment')->insert($data)){

        //     return redirect("goodinfo/{{$data['gid']}}")->with('success',"评论添加成功");
        // } 
        // dd($data);
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
