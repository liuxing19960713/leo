<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入模型类Administrator
use App\Model\Article;
//导入校验类
use App\Http\Requests\Articleinsert;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据列表
        $k=$request->input('keywords');
        //文章列表
        $data=Article::where("title",'like','%'.$k.'%')->orderBy('id','ASC')->paginate(3);
        return view("Admin.Article.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //导入添加页
        return view('Admin.Article.add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Articleinsert $request)
    {
        //获取所有数据
        $data=$request->except(['_token']);
        //dd($data);

       //通过正则分离获取图片上传路径
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$data['content'],$arr);
        //dd($arr);
       //将图片路径存入数据库图片字段
        $data['thumb']=implode(',',$arr[1]);
        
        // foreach ($arr[0] as $k => $v) {
        //     if($k >= 1){
        //         $need[$k] = explode($v, $need[$k-1][1]);
                
        //     }else{
        //         $need[$k] = explode($v, $data['content']);
            
        //     }
        // }
        // //获取并合并文字
        // $cneed = '';
        
        // $sum = (count($need));
        
        
        // if ($sum > 1) {

        //     // echo 'diuni ';
        //     foreach ($need as $key => $value) {
        //         $cneed .=$value[0];
        //     }
        //      $cneed .=$need[$sum-1][1];
        // }else{
        //     $cneed = implode('', $need[0]);

        // }
       
        // //将文字存入数据库文字字段
        // $data['text']=$cneed;
        //dd($data['content']);
        //dd($arr);
        //获取对应的name
        $admin=$data['admin_id'];
        //DB类来获取对应的会员信息
        $info = DB::table('admin')->where('name','=',$admin)->first();
        //dd($info);
        //获取对应id
        $admin_id = $info->id;
        //赋值
        $data['admin_id']=$admin_id;
        
        //dd($data);
        if(Article::create($data)){

            //设置提示信息 存储在session里 with设置session信息
            return redirect('/article')->with('success','添加成功');
        }else{
            return redirect('/article/create')->with('error','添加失败');
        }
        
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
        $info=Article::where('id','=',$id)->first();
        return view('Admin.Article.edit',['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Articleinsert $request, $id)
    {
        //获取修改的数据
        $data=$request->except(['_token','_method','admin_id','editorValue']);
        //与数据添加一样的操作
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$data['content'],$arr);
        var_dump($arr);
        $data['thumb']=implode(',',$arr[1]);
        
        // foreach ($arr[0] as $k => $v) {
        //     if($k >= 1){
        //         $need[$k] = explode($v, $need[$k-1][1]);
                
        //     }else{
        //         $need[$k] = explode($v, $data['content']);
        //     // dd($need);
        //     }
        // }
      
        // $cneed = '';
        // var_dump($need);
        // $sum = (count($need));
        
        // if ($sum > 1) {

        //     // echo 'diuni ';
        //     foreach ($need as $key => $value) {
        //         $cneed .=$value[0];
        //     }
        //      $cneed .=$need[$sum-1][1];
        // }else{
        //     $cneed = implode('', $need[0]);

        // }
        // // var_dump($cneed);
        // //var_dump($cneed);
        // $data['text']=$cneed;
        //dd($data['content']);
        //dd($arr);
        //获取对应的name
        //$admin=$data['admin_id'];
        //DB类来获取对应的会员信息
        //$info = DB::table('admin')->where('name','=',$admin)->first();
        //获取对应id
        //$admin_id = $info->id;
        //赋值
        //$data['admin_id']=$admin_id;
        //$data['content']=$data['editorValue'];
      
        //unlink($data['editorValue']);
        //dd($da);
        if(Article::where('id','=',$id)->update($data)){
            return redirect('/article')->with('success','修改成功');
        }else{
            return redirect("'/article/'.$id.'/edit'")->with('error','修改失败,请至少修改一项,如不需要修改,请返回');
        }
        //dd($data);
        
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

    public function del(Request $request){
        //获取参数id
        $id=$request->input('id');
        $info=DB::table('article')->where('id','=',$id)->first();
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$info->content,$arr);
        //dd($arr);
        if(DB::table('article')->delete($id)){
            foreach($arr['1'] as $key=>$value){
                unlink(".".$value);
            }
            //json格式
            return response()->json(['msg'=>1]);
        }else{
            return response()->json(['msg'=>0]);
        }
    }

    public function ajax(Request $request){
        // return '1
        $data = array();
        $arr = [0=>'禁用',1=>'启用'];
       $data['sta'] = $request->input('sta');
       $data['id'] = $request->input('id');
        //获取状态
       // $sta = $data['sta'];
       // 将状态转换为对应的数字
       $sta=array_search($data['sta'], $arr);
       if ($sta == 0) {
            $sta = 1;
       }else{
            $sta = 0;
       }
       if ($sta > 1 || $sta < 0) {
            return redirect('/article')->with('error','数据出错,请联系管理员');
        }
       //操作数据库
       if (DB::table('article')->where('id','=',$data['id'])->update(['status'=>$sta])) {
        //更新成功的话就把sta 转换成 中文
        $sta = $arr[$sta];
            return response()->json(['msg'=>'1','sta'=>$sta]);
       }else{
            return response()->json(['msg'=>'0']);
       }

    }
}
