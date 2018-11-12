<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Comment;
// 导入校验类
use App\Http\Requests\Re_CommentInsert;
class Re_CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //主页
        //获取关键词
        $k = $request->input('keywords');
        $ks = $request->input('keywordss');
        // echo '主页';
        $data = DB::table('re_comment')->join('admin','re_comment.admin_id','=','admin.id')->select('re_comment.*','admin.name')->where('name','like','%'.$k.'%')->where('comm_id','like','%'.$ks.'%')->paginate(3);
        // dd($data);
        return view('Admin.Admin.Comment.recomment',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo '1';
    }
    // 新增加一个方法 来增加写入的内容
    public function insert($id){
        // echo $id;
        // 评论表对应的id
        $commid = $id;

        // $data = DB::table('comment')
        // ->join( 'user' , 'user.id' , '=' , 'comment.uid' )
        // ->where( 'id' , '=' , $commid )
        // ->select('user.uname','comment.*')
        // ->first();
        $data = Comment::find($commid);
        // 获取评论内容
        $comment = $data->comment;
        // dd($comment);
        // 获取评论用户名字
        $name = $data->user->uname;
        // 获取评论物品的名字
        $goodsname = $data->goods->goods_name;
        // exit;
        // var_dump($name);
        // var_dump($goodsname);
        // dd();
        return view('Admin.Admin.Comment.recominsert',['commid'=>$commid,'name'=>$name,'goodsname'=>$goodsname,'comment'=>$comment]);
    }
    //新增上传 方法
    public function up(Request $request,$id){
         // 评论表对应的id
        $commid = $id;
        //admin_id
        $name = session('name');
        // 获取回复内容
        $recomment = $request->recomment;
        if (empty($recomment)) {
            return redirect('/recommentinsert/'.$id)->with('error','评论内容不能为空');
        }
        //获取admin_id
        $adminid = DB::table('admin')->where('name','=',$name)->value('id');
        // dd($commid);
        // var_dump($recomment);
        //获取评论时间
        $addtime = time();
        $data = array('admin_id'=>$adminid,'comm_id'=>$commid,'comment'=>$recomment,'addtime'=>$addtime);
        if (DB::table('re_comment')->insert($data)) {
            // 成功的话修改 回复评论的状态
            if (DB::table('comment')->where('id','=',$commid)->update(['re_status'=>1])) {
             return redirect('/comment')->with('success','回复评论成功');
            }

        }else{
            return redirect("/recommentinsert/{$id}")->with('error','回复评论失败');
        }
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
        // echo '这是修改页';
// 获取用户评论内容id
        $re = DB::table('re_comment')->where('id','=',$id)->first();
        // dd($commid);
        $commid = $re->comm_id;
        // dd($commid);
        $recomment = $re->comment;
        // dd($recomment);
        $data = Comment::find($commid);
        // dd($data);
         // 获取评论内容
        $comment = $data->comment;
        // dd($comment);
        // 获取评论用户名字
        $name = $data->user->uname;
        // dd($name);
        // 获取评论物品的名字
        $goodsname = $data->goods->goods_name;
        // dd($goodsname);
        return view('Admin.Admin.Comment.recomedit')->with(['comment'=>$comment,'name'=>$name,'goodsname'=>$goodsname,'recomment'=>$recomment,'id'=>$id]);
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
        //这是回复评论更新页
        // echo '更新回复';
        // dd($request->all());
        $id = $id;
        // dd($id);
        $comment = $request->recommentedit;
        if (empty($comment)) {
            return redirect("/recomment/{$id}/edit")->with('error','修改回复失败,回复内容不能为空');
        }
        // dd($comment);
        if (DB::table('re_comment')->where('id','=',$id)->update(['comment'=>$comment])) {
            return redirect('/recomment')->with('success','修改回复成功');
        }else{
            return redirect("/recomment/{$id}/edit")->with('error','修改回复失败,请至少修改一些内容,如不需要请返回');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取id
        // dd($id);
        if (DB::table('re_comment')->where('id','=',$id)->delete()) {
            return redirect('/recomment')->with('success','删除成功');
        }else{
            return redirect('recomment')->with('error','删除失败');
        }
    }
    public function Ajax(Request $request){
        $id = $request->input('id');
        // return json_encode($id);
        if (DB::table('re_comment')->where('id','=',$id)->delete()) {
            return response()->json(['msg'=>1]);
        }else{
            return response()->json(['msg'=>0]);
        }
    }
}
