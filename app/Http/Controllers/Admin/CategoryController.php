<?php
// 分类功能
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Admin\AdminCateinsert;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *  分类列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //分裂列表
        // 查询全部数据
        // $data = DB::table('category')->get(); //
        //调整类别顺序
        $key  = $request->input('keyword');
        // $cate=DB::select('SELECT *,concat(path,",",id) as paths FROM cates order by paths');
        $cate = DB::table("category")->where("name",'like',"%$key%")->orderBy('id', 'asc')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy("paths")->paginate(2);
        foreach($cate as $key=>$value){
            $arr = explode(",",$value->path);
            //获取逗号个数
            $len = count($arr)-1;
            // 重复字符串函数
            $cate[$key]->name = str_repeat("--|", $len).$value->name;


        }
        return view("Admin.Category.index",['cate'=>$cate,'request'=>$request->all()]);
    }
    /**
     * 调整类别顺序 添加分隔符
     * @author 刘兴
     * @DateTime 2018-11-07T18:41:52+0800
     * @return   [type]                   [description]
     */
    public function getcates()
    {
        $cate = DB::table("category")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        // 遍历数据
        foreach ($cate as $key => $value) {
            //转为数组
            $arr = explode(',', $value->path);
            // 获取逗号个数
            $len = count($arr)-1;
            // 重复字符串函数
            $cate[$key]->name=str_repeat("--|", $len).$value->name;
        }
        return $cate;
    }

    /**
     * Show the form for creating a new resource.
     *     加载添加分类模板
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载分类模板
        $data = DB::table('category')->get();
        // dd($data);
        return view("Admin.Category.add",['data'=>$data]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCateinsert $request)
    {
        //
        $data = $request->except(['_token']);
        $pid  = $request->input('pid');
        // dd($pid);
        // var_dump($data);
        $data['status'] = 1;
        // $data['path']   = 
        if ($data['pid']==0) {
            $data['path'] ='0';
        }else{
            $info = DB::table('category')->where('id','=',$data['pid'])->first();
            $data['path'] = $info->path.",".$pid;
        }
        // dd($data);
        if (DB::table('category')->insert($data)) {
            return redirect('/acate')->with('success',"添加成功"); 
        }else{
            return redirect('/acate/create')->with('error',"添加失败");
        }
    }

    /**
     * [用于ajax删除]
     * @author 刘兴
     * @DateTime 2018-11-07T10:06:26+0800
     * @param    string                   $value [description]
     */
    public function acadel()
    {
        $id     = $_GET['id'];
        $info   = DB::table('category')->where('pid','=',$id)->count();
        if($info>0){
            return json_encode(['msg'=>3]);
        }else{
            if (DB::table('category')->where("id",'=',$id)->delete()) {
                return json_encode(['msg'=>1]);
            }else{
                return json_encode(['msg'=>0]);
            }
        }
        // echo $id;
       
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
     * 修改模板
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取id
        // dd($id);
        $id     = $id;
        $data   = DB::table('category')->where('id','=',$id)->first();
        // var_dump($data);
        $name = $data->name;
        // var_dump($name);
        $cate =self::getcates();
        return view("Admin.Category.edit",['data'=>$data,'cate'=>$cate]);

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
        //获取数据
        // dd($request->all());
        $id   = $id;
        $data = $request->except(['_token','_method']);
        // dd($id);
        if (DB::table('category')->where("id",'=',$id)->update($data)) {
            return redirect('/acate')->with('success','编辑ok');
        }else{
            return redirect('/acate/$id/edit')->with('error','编辑失败');
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
