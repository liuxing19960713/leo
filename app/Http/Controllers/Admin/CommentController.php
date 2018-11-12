<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //这是评论主页
        // 获取所有关键词
        //
        $k  = $request->input('keywords');
        $ks = $request->input('keywordss');
        // dd($ks);
        // echo "哈哈";
        // dd('哈哈');
        $data = DB::table('comment')->join('user','comment.uid','=','user.id')->join('goods','comment.gid','=','goods.id')->select('comment.*','user.uname','goods.goods_name')->where('goods_name','like','%'.$k.'%')->where('uname','like','%'.$ks.'%')->paginate(3);
        // dd($data);
        // $data = DB::table('comment')->get();
        // $data = DB::table('comment')->join('goods','comment.gid','=','goods.id')->get();
        // $data = DB::table('comment')->join('user','user.id','=','comment.uid')->get();
        // dd($data);
        return view('Admin.Admin.Comment.comment',['data'=>$data,'request'=>$request->all()]);
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
        //输出id
        // echo $id;
        $id = $id;
        if (DB::table('comment')->where('id','=',$id)->delete()) {
            return redirect('/comment')->with('success','删除成功');
        }else{
            return redirect('/comment')->with('error','删除失败');
        }
    }

    // Ajax 删除
    public function Ajax(Request $request){
        // return $request->input('id');
        $id = $request->input('id');
        if (DB::table('comment')->where('id','=',$id)->delete()) {
            return response()->json(['msg'=>1]);
        }else{
            return response()->json(['msg'=>0]);
        }
    }
}
