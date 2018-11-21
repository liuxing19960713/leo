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
        // dd(session());
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
        //url
        $url = "http://v.juhe.cn/toutiao/index?type=shishang&key=d89e6a75ac9ce8ae46f190d7d4b2a2e8";
        $method = "get";
        $post_data = 0;
        $info   = News($url,$method,$post_data);
        // dd($info);
      
        $arr    = json_decode($info,true);
        $news   = $arr['result']['data'];
      
        return view("Home.Home.article",['rows'=>$rows,'article'=>$article,'news'=>$news]);
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
        $data=DB::table('goods')->where('cate_id','=',$info->cate_id)->get();

        // dd(session('hid'));
        $id     = session('hid');
        $uname  = DB::table('user')->where("id","=",$id)->value('uname');//用户信息
        // $value = '/static/uploads/goods/'.$value;
         
        //评论总数
        $comnum = DB::table('comment')->count();

        $cate=DB::table('category')->where('id','=',$info->cate_id)->first();

         $ca=explode(",",$cate->path);
         $c=(count($ca));

         //dd($ca[1]);
         //var_dump($ca[1]);
         if(($c)>1){
            //echo 1;
          $category=DB::table('category')->where('id','=',$ca[1])->first();  
         }else{
            //echo 2;
            $category=DB::table('category')->where('id','=',$info->cate_id)->first();
         }
         $discount=DB::table('discount')->where('cid','=',$category->id)->join('category','category.id','cid')->select('discount.*','category.name')->get();
        // dd($data);
        // $value = '/static/uploads/goods/'.$value;
        // dd($value);

       // 获取用户所拥有的优惠券的did数组
       // 用户id
        $uid = session('hid');
        // dd($uid);
        $dlogs = array();
        $d = DB::table('discount_log')->where('uid','=',$uid)->pluck('did');
         // dd($d);
        foreach ($d as  $ds) {
            $dlogs[] = $ds;
        }
        // 上面就是来存储用户拥有的优惠券的did
        // dd($dds);
        return view("Home.Home.goodinfo",['info'=>$info,'pic'=>$value,'data'=>$data,'discount'=>$discount,'dlogs'=>$dlogs,'comnum'=>$comnum,'uname'=>$uname]);


    }
    //商品列表页
    public function search(Request $request,$id)
    {
         //dd($id);
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
