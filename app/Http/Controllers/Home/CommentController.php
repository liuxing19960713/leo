<?php

namespace App\Http\Controllers\Home;

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
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Home.comment.add');
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
        // dd($id);
        $oid    = $id;
        $olist  = DB::table('odetail')->where("oid","=",$oid)->first();
        $data['oid'] = $olist->oid;
        $data['gid'] = $olist->gid;
        $uid    = session('hid');
        $data['uid'] = $uid;
        $ulist  = DB::table('user')->where("id","=",$uid)->first();

        $data['uname']   = $ulist->uname;
      
        return view('Home.comment.add',['data'=>$data]);
        // dd($data);
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
        // dd($id);
        $data = $request->except(['_token','_method']);
        $oid  = $id;
        $data['oid'] = $id;
        $data['addtime'] = time();
        $insert = DB::table('comment')->insert($data);
        if($insert){
            $info   =  DB::table('order') ->where('id','=', $oid) ->update(['status' => 4]);
            return redirect("/mypersonal")->with('success',"评论添加成功");
                 
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
        //
    }
}
