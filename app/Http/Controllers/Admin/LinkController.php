<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 导入模型类
use App\Model\Link;
use App\Model\Administrator;
//导入添加的校验类
use App\Http\Requests\Linkinsert;
//导入修改的校验类
use App\Http\Requests\Linkedit;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 显示数据列表 link.blade.php
    public function index(Request $request)
    {
        // 获取搜索关键词
        $k = $request->input('keywords');
        // $ks = $request->input('keywordss');
        // echo '这是友情链接主页';
        //获取数据列表
        $data = Link::where('urlname','like','%'.$k.'%')->paginate(4);
        // dd($data);
        // $id = array();
        // foreach ($data as  $value) {
        //     $id[] = $value->admin_id;
        // }
        // 获取admin的id
        //dd($id);
        // dd($data);
        // $info = Link::find(2);
        // dd($info->admin->name);
        // 限定id条件
        //
        // $id = [6,7];
        // // 限定状态条件
        // $status = 1;
        // // 模型关联查询
        // $res = Administrator::with(['link'=>function($query) use($id,$status) {//use 是条件
        //     //$query->whereIn('id',$id);
        //     // admin_id 为外键  当获取数据的时候必须的加上这个字段 才能关联到
        //     $query->select('id','urlname','link_url','status','admin_id')
        //     // when 是过滤条件
        //     ->when(isset($status),function($query) use($status){
        //         $query->where('status',$status);
        //     })
        //     ;
        // }])
        // ->find(8);
        // dd($res->link);

        //link 发起请求  查询 admin
        // $res = Link::get();
        // foreach ($res as $key => $value) {
        //     dd($value->admin->name);
        // }

        // exit;
        //dd($res);
        // $name = Link::where('')
        //加载模板
        return view('Admin.Admin.Link.link',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //这是添加页
        // echo '添加页';
        return view('Admin.Admin.Link.linkadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Linkinsert $request)
    {
        //获取所有数据
        // dd($request->all());
        $data = $request->except('_token');
        // dd($data);
        // 获取对应的name
        $admin = $data['admin_id'];
        // dd($admin);
        // DB类来获取对应的会员信息
        $info = DB::table('admin')->where('name','=',$admin)->first();
        // 获取对应id
        $admin_id = $info->id;
        // 赋值
        $data['admin_id']=$admin_id;
        //批量添加 Model::create
        if (Link::create($data)) {
            return redirect('/link')->with('success','添加成功');
        }else{
            return redirect('/link/create')->with('error','添加失败');
        }
        // dd($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //一般用作内容页

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改页
    public function edit($id)
    {
        //这是修改页
        //一般用作修改页
        // echo '修改页';
        // dd($id);
        // 获取id
        $id = $id;
        //获取单条信息
        $info = Link::where('id','=',$id)->first();
        // dd($info);

        return view('Admin.Admin.Link.linkedit',['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Linkedit $request, $id)
    {
        //获取修改的数据
        $data = $request->except(['_token','_method','admin_id']);
        // dd($id);
        if (Link::where('id','=',$id)->update($data)) {
            return redirect('/link')->with('success','修改成功');
        }else{
            return redirect("'/link/'.$id.'/edit'")->with('error','修改失败,请至少修改一项,如不需要修改,请返回');
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
        // 执行删除
        if (Link::where('id','=',$id)->delete()) {
            return redirect('/link')->with('success','删除成功');
        }else{
            return redirect('/link')->with('error','删除失败');
        }
    }

    public function Ajax(Request $request){
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
            return redirect('/wheel')->with('error','数据出错,请联系管理员');
        }
       //操作数据库
       if (DB::table('link')->where('id','=',$data['id'])->update(['status'=>$sta])) {
        //更新成功的话就把sta 转换成 中文
        $sta = $arr[$sta];
            return response()->json(['msg'=>'1','sta'=>$sta]);
       }else{
            return response()->json(['msg'=>'0']);
       }

    }
}
