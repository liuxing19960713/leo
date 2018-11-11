<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入请求校验类
use App\Http\Requests\AdminAdverinsert;
//导入请求校验类
use App\Http\Requests\AdminAdveredit;
//导入模型类Adver
use App\Model\Adver;
=======
use App\Models\Adver;


//引入Config
use Config;
class AdverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->flashOnly('keywords');
        $k=$request->input('keywords');
        $data=Adver::where("ad_name",'like','%'.$k.'%')->orderBy('id')->paginate(3);
        return view("Admin.Admin.adver",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Admin.addadver");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminAdverinsert $request)
    {
        //执行添加
        $request->flashExcept('_token');
        // dd($request->all());
        $data=$request->except(['_token']);
        //初始化名字
        $name=time()+rand(1,10000);
        //获取上传文件后缀
        $ext=$request->file("pic")->getClientOriginalExtension();
        $new=$name.".".$ext;
        $data['pic']=$new;
        // dd($data);
        if (Adver::create($data)) {
            //移动到指定的目录下（提前在public下新建uploads目录）
            $request->file("pic")->move(Config::get('app.uploads'),$data['pic']);
            return redirect("/adver")->with('success','添加成功');
        } else {
            return redirect("/adver/create")->with('error','添加失败');
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
        $user=Adver::where("id",'=',$id)->first();
        //加载模板 分配数据
        return view("Admin.Admin.editadver",['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminAdveredit $request, $id)
    {
        $data=$request->except(['_token','_method']);
        $del=Adver::where("id",'=',$id)->first();
        $pic="./uploads/".$del['pic'];
        // dd($data);
        //1.检测是否具有文件上传
        if ($request->hasFile('pic')) {
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            $ext=$request->file("pic")->getClientOriginalExtension();
            $new=$name.".".$ext;
            $data['pic']=$new;
            $request->file("pic")->move(Config::get('app.uploads'),$name.".".$ext);
             unlink("$pic");
        }
        //执行修改
        if (Adver::where("id",'=',$id)->update($data)) { 
            return redirect("/adver")->with('success','修改成功');
        }else{
            return redirect("/adver/{id}/edit")->with('error','修改失败');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除
    public function destroy($id)
    {
        //获取需要删除的数据
        $del=Adver::where("id",'=',$id)->first();
        $pic="./uploads/".$del['pic'];
        if (Adver::where("id",'=',$id)->delete()) {
            unlink("$pic");
            return redirect("/adver")->with('success','删除成功');
        } else {
            return redirect("/adver")->with('error','删除失败');
        }
    }
}
