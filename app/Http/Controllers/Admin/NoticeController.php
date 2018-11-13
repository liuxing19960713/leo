<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入请求校验类
use App\Http\Requests\AdminNotice;
//导入模型类Adver
use App\Model\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据
        $request->flashOnly('keywords');
        $k=$request->input('keywords');
        $data=Notice::where("title",'like','%'.$k.'%')->orderBy('id')->paginate(3);
        //加载模板
        return view("Admin.Notice.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Notice.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminNotice $request)
    {
        //执行添加
        $request->flashExcept('_token');
        // dd($request->all());
        $data=$request->except(['_token']);
        // dd($data);
        if (Notice::create($data)) {
            return redirect("/notice")->with('success','添加成功');
        } else {
            return redirect("/notice/create")->with('error','添加失败');
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
       $info=Notice::where("id",'=',$id)->first();
        return view("Admin.Notice.edit",['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminNotice $request, $id)
    {
        //执行修改
        $data=$request->except(['_token','_method']);
        $info=Notice::where("id",'=',$id)->first();
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$info->content,$arr);
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$data['content'],$arr1);
       //执行修改
        if (Notice::where("id",'=',$id)->update($data)) {
            // unlink(图片路径);
            //遍历
            foreach ($arr[1] as $key => $value) {
                if (empty(in_array($value,$arr1[1]))) {
                    unlink(".".$value);
                }
            }
            return redirect("/notice")->with('success','修改成功');
        } else {
            return redirect("/notice/$id/edit")->with('error','修改失败');

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
        $info=Notice::where("id",'=',$id)->first();
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$info->content,$arr);
        if (Notice::where("id",'=',$id)->delete()) {
                // unlink(图片路径);
                //遍历
                if (isset($arr[1])) {
                        foreach($arr[1] as $key=>$value) {
                        unlink(".".$value);
                    } 
                }
                return redirect("/notice")->with('success','删除成功');
            } else {
                return redirect("/notice")->with('error','删除失败');
            }
    }
}
