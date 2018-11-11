<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入请求校验类
use App\Http\Requests\AdminCompanyinsert;
//导入请求校验类
use App\Http\Requests\AdminCompanyedit;
//导入模型类Company
use App\Model\Company;
=======
use App\Models\Company;
class CompanyController extends Controller
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
        $data=Company::where("commpany",'like','%'.$k.'%')->orderBy('id')->paginate(3);
        return view("Admin.Admin.company",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Admin.addcompany");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCompanyinsert $request)
    {
        //执行添加
        $request->flashExcept('_token');
        // dd($request->all());
        $data=$request->except(['_token']);
        // dd($data);
        if (Company::create($data)) {
            return redirect("/company")->with('success','添加成功');
        } else {
            return redirect("/company/create")->with('error','添加失败');
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
        // $data=Company::find($id)->info;
        // return view("Admin.Admin.")
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        //获取需要修改的数据
        $user=Company::where("id",'=',$id)->first();
        //加载模板 分配数据
        return view("Admin.Admin.editcompany",['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCompanyedit $request, $id)
    {

        $data=$request->except(['_token','_method']);
        $edit=Company::where("commpany",'=',$data['commpany'])->first();
        //防止公司名重复
        if ($edit) {
            if ($id != $edit['id']) {
                return redirect("/company/$id/edit")->with('error','公司名重复');
            }
        }
        //执行修改
        if (Company::where("id",'=',$id)->update($data)) {
            return redirect("/company")->with('success','修改成功');
        } else {
            return redirect("/company/$id/edit")->with('error','修改失败');

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
        if (Company::where("id",'=',$id)->delete()) {
            return redirect("/company")->with('success','删除成功');
            } else {
                return redirect("/company")->with('error','删除失败');
            }
    }
}
