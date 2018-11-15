<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Http\Requests\AdminLogin;
class AdminloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载登录模板
        return view("Admin.Admin.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //退出
        //销毁session
        $request->session()->pull('name');


        $request->session()->pull('id');
        $request->session()->pull('nodelist');
        return redirect("/adminlogin");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminLogin $request)
    {
        // dd($request->all());
        //获取登录用户名和密码
        $name=$request->input("name");
        $pwd=$request->input("pwd");
        // $captcha = $request->input('captcha');
        // dd($captcha);
        //闪存name
        $request->flashOnly('name');
        //要数据表的数据做对比
        //检测用户名
        $info=DB::table("admin")->where("name",'=',$name)->first();
        //判断
        if ($info) {
            //检测密码
            // echo "ok";
            //哈希数据值检测
            if (Hash::check($pwd,$info->pwd)) {
                // dd('dada');
                session(['id'=>$info->id]);
                //把登录的用户名存储在session里

                session(['name'=>$name]);
               //获取后台登录用户的所有权限列表信息
                $sql = "select DISTINCT n.action,n.model,n.controller from admin,role_node as rn,node as n where admin.rid=rn.rid and rn.nid=n.id and rn.aid={$info->id}";

                $list = DB::select(DB::raw($sql));
                // var_dump($list);
                // var_dump($list);die;
                //后台首页权限写入权限信息列表里
                $nodelist['AdminController'][]="index";
                //遍历
               foreach($list as $key=>$value){
                    //把登录用户的所有权限写入$nodelist 数组里
                    $nodelist[$value->controller][]=$value->action;
                    //如果权限列表有create  添加store
                    if($value->action=="create"){
                        $nodelist[$value->controller][]="store";
                    }
                    //如果权限列表有edit  添加update
                    if($value->action=="edit"){
                        $nodelist[$value->controller][]="update";
                    }
                }
                // dd($nodelist);
                //登陆后所有权限列表信息存储在session里
                session(['nodelist'=>$nodelist]);
                // dd(session('nodelist'));
                // die;
                return redirect("/admin")->with('success','登录成功');
            } else {
                // dd('dada');
                return back()->with('error','密码有误');
            }
        } else {
            // echo "用户名有误";
            return back()->with('error','用户名有误');
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
