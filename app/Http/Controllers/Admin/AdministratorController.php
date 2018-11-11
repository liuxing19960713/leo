<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//导入adminUserinsert 校验类
use App\Http\Requests\Administratorinsert;
//导入模型类Administrator
use App\Model\Administrator;
class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索的关键字
        $k=$request->input('keywords');
        //管理员列表
        $data=Administrator::where("name",'like','%'.$k.'%')->paginate(3);


        return view("Admin.Administrator.index",['data'=>$data,'request'=>$request->all()]);
    }
    //分配角色
    public function rolelist($id)
    {
        // echo "this is rolelist";
        //获取用户的信息
        $info=Administrator::where("id",'=',$id)->first();
        //加载模板
        return view("Admin.Administrator.rolelist",['info'=>$info]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载用户添加模板
        return view("Admin.Administrator.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Administratorinsert $request)
    {
        //获取所有数据
       
        $data=$request->except(['repassword','_token']);
        //密码加密
        $data['pwd']=Hash::make($data['pwd']);
        $data['level'];
        //dd($data['level']);
        //dd($data);
        switch ($data['level']){
            case "v1":
                $data['level']=1;
            break;
            case "v2":
                $data['level']=2;
            break;
            case "v3":
                $data['level']=3;
            break;
            case "v4":
               $data['level']=4;
            break;
           
        }
        

        if(Administrator::create($data)){

            //设置提示信息 存储在session里 with设置session信息
            return redirect('/administrator')->with('success','添加成功');
        }else{
            return redirect('/administrator/create')->with('error','添加失败');
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

        //获取需要修改的数据
        $user=Administrator::where("id",'=',$id)->first();
        //加载模板 分配数据
        return view("Admin.Administrator.edit",['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取参数
        $data=$request->except(['_token','_method','repassword']);
        switch ($data['level']){
            case "v1":
                $data['level']=1;
            break;
            case "v2":
                $data['level']=2;
            break;
            case "v3":
                $data['level']=3;
            break;
            case "v4":
               $data['level']=4;
            break;
           
        }
        if(Administrator::where("id",'=',$id)->update($data)){
            return redirect("/administrator")->with('success','修改成功');
        }else{
            return redirect("/administrator/{id}/edit")->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function del(Request $request){
            //dd(1);
            //获取参数id
            $id=$request->input('id');
            if(Administrator::destroy($id)){
                //json格式
                return response()->json(['msg'=>1]);
            }else{
                return response()->json(['msg'=>0]);
            }
        }
}
