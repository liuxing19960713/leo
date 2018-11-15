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
    //分配权限
    public function rolelist($id)
    {
        // echo "this is rolelist";
        //获取用户与角色的信息
        $infos = DB::table('admin')->where('admin.id','=',$id) ->join('role', 'admin.rid', '=', 'role.id')->select('admin.*', 'role.rname as rname') ->get();
        foreach ($infos as $key => $value) {
            $info = $value;
        }
        $role = DB::table('node')->get();
        // var_dump($info);
        //加载模板
        return view("Admin.Administrator.rolelist",['info'=>$info,'role'=>$role]);
    }

    //处理分配权限信息
    public function save_rolelist(Request $request)
    {
       $data = $request->except(['_token']);
        $nid = $request->input('nid');
       // var_dump($nid);
        $data['rid'] = $request->input('rid');
        $data['aid'] = $request->input('aid');
        // 删除当前角色已有的权限
        DB::table('role_node')->where('rid','=',$data['rid'])->delete();
        foreach ($nid as $v) {
            // $data['nid'] =　$v;
            $data['nid']= $v;
            // var_dump($data);
            DB::table('role_node')->insert($data);
        }
        return redirect('/administrator')->with('success','权限分配成功');
       // var_dump($data);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载用户添加模板

        //分配角色信息
        $role = DB::table('role')->get();

        // var_dump($role);
        return view("Admin.Administrator.add",['role'=>$role]);

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

      


        //dd($data['level']);
        //dd($data);

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

        $user=DB::table('admin')->where("id",'=',$id)->first();
        //分配角色信息
        $role = DB::table('role')->get();
        // dd($role);
        //加载模板 分配数据
        return view("Admin.Administrator.edit",['user'=>$user,'role'=>$role]);

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
        //获取参数
        $data=$request->except(['_token','_method','repassword']);

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
