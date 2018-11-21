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

    public function getsear($id)
    {
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
        $sear=$this->getsear(7);

        //首页方法
       
 
       
        // dd($info);

        //首页方法

        // dd($wheel);
        // 首页商品收藏方法
        // 找到此用户收藏的商品
        $cogoods=DB::table('cogoods')->where('uid','=',session('hid'))->get();
            // dd($cogoods[0]);
            
            if(!empty($cogoods[0])){
            foreach($cogoods as $row){
                $goods[]=$row->gid;
            }
            
           foreach ($info as $rows){
        //判断此商品是否被此用户收藏
           if(in_array($rows->id,$goods)){
            // echo 1;
            $search['id']=$rows->id;
            $search['goods_name']=$rows->goods_name;
            $search['price']=$rows->price;
            $search['desrc']=$rows->desrc;
            $search['z_pic']=$rows->z_pic;
            //已被收藏
            $search['status']=1;
           }else{
            $search['id']=$rows->id;
            $search['goods_name']=$rows->goods_name;
            $search['price']=$rows->price;
            $search['desrc']=$rows->desrc;
            $search['z_pic']=$rows->z_pic;
            //未被收藏
            $search['status']=0;
           }
           $se[]=$search;
           
        }
        //var_dump($se);
        
    }else{
        
         foreach ($info as $rows){
            $search['id']=$rows->id;
            $search['goods_name']=$rows->goods_name;
            $search['price']=$rows->price;
            $search['desrc']=$rows->desrc;
            $search['z_pic']=$rows->z_pic;
            $search['status']=0;
            $se[]=$search;


        }
        
    }
    //如果该用户没有收藏商品
    if(!isset($se)){
        $se=$info;
    }
   
        //首页方法
        return view("Home.Home.index",['sear'=>$sear,'info'=>$info,'wheel'=>$wheel,'se'=>$se]);



 
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

        /******时尚杂志接口******************************************/
        $url = "http://v.juhe.cn/toutiao/index?type=shishang&key=d89e6a75ac9ce8ae46f190d7d4b2a2e8";
        $method = "get";
        $post_data = 0;
        $info   = News($url,$method,$post_data);
        $arr    = json_decode($info,true);//解析json
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
        $uid     = session('hid');
        //用户信息
        $uname  = DB::table('user')->where("id","=",$uid)->value('uname');
        // $value = '/static/uploads/goods/'.$value;
        /********评论信息******评论总数*******************/
        $comnum =count($comlist = DB::table('comment')->where("gid","=",$info->id)->get());
        /********评论信息******评论总数*******************/
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

        //判断是否已收藏商品
        //dd
        $user=DB::table('user')->where('uname','=',session('username'))->get();
        //dd($user);
        $cogoods=DB::table('cogoods')->where('uid','=',$uid)->where('gid','=',$info->id)->first();
        // dd($cogoods);
        if(empty($cogoods)){
            $cogoods=1;
        }else{
            $cogoods=2;
        }
        //dd(3);
       


        return view("Home.Home.goodinfo",['info'=>$info,'pic'=>$value,'data'=>$data,'discount'=>$discount,'dlogs'=>$dlogs,'comnum'=>$comnum,'uname'=>$uname,'cogoods'=>$cogoods,'comlist'=>$comlist]);




    }
    //商品列表页
    public function search(Request $request,$id)
    {
         //dd($id);
        $search=$this->getsear($id);
 
         //dd($search);
        
            $cogoods=DB::table('cogoods')->where('uid','=',session('hid'))->get();
            // dd($cogoods[0]);
            
            if(!empty($cogoods[0])){
            foreach($cogoods as $row){
                $goods[]=$row->gid;
            }
            
           foreach ($search as $rows){
           if(in_array($rows->id,$goods)){
            // echo 1;
            $sear['id']=$rows->id;
            $sear['goods_name']=$rows->goods_name;
            $sear['price']=$rows->price;
            $sear['desrc']=$rows->desrc;
            $sear['z_pic']=$rows->z_pic;
            $sear['status']=1;
           }else{
            $sear['id']=$rows->id;
            $sear['goods_name']=$rows->goods_name;
            $sear['price']=$rows->price;
            $sear['desrc']=$rows->desrc;
            $sear['z_pic']=$rows->z_pic;
            $sear['status']=0;
           }
           $se[]=$sear;
           
        }
        //var_dump($se);
        
    }else{
        
         foreach ($search as $rows){
            $sear['id']=$rows->id;
            $sear['goods_name']=$rows->goods_name;
            $sear['price']=$rows->price;
            $sear['desrc']=$rows->desrc;
            $sear['z_pic']=$rows->z_pic;
            $sear['status']=0;
            $se[]=$sear;

        }
        
    }
    //var_dump($se);        
            
            
    //dd($se);
    //dd(10);
        //var_dump($good);
        //dd($se);
        if(!isset($se)){
            $se=$search;
        }
        return view("Home.Home.search",['search'=>$search,'se'=>$se]);
 

    }
    /**
     * [keywords 首页搜素]
     * @author 刘兴
     * @DateTime 2018-11-21T19:12:40+0800
     * @return   [type]                   [description]
     */
    public function keywords(Request $request)
    {
        $key    = $request->input("keywords");
        $info   = DB::table('goods')->where("goods_name","like","%$key%")->paginate(3);
        $count  = count($info);
        // dd($count); 
        // dd($info);
        return view("Home.Home.keywords",['info'=>$info,'count'=>$count]);
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
