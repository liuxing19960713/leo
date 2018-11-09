<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 导入校验类
use App\Http\Requests\Admin\AdminGoodsinsert;
// 导入DB
use DB;
//导入商品表模型
use App\Model\Admin\Goods;
// 引入分类
use App\Http\Controllers\Admin\CategoryController;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //首页
        //
        $k = $request->input('keyword');
        //商品信息
        $info = DB::table('goods')->where('goods_name','like',"%$k%")->join('category','goods.cate_id','=','category.id')->select('goods.id as gid','goods.goods_name','goods.brank','goods.status','goods.stock','goods.updated_at','goods.created_at','category.name')->paginate(2);
        // $info = paginate(2);
        return view('Admin.Goods.index',['info'=>$info,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *   商品添加模板
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = new CategoryController();
        $info = $cate->getcates();
        return view("Admin.Goods.add",['info'=>$info]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminGoodsinsert $request)
    {
        $data = $request->except(['_token']);
        // 商品图片
        // 调用upload的方法 upload的方法在app/Libary里
        $app  = uploads($request->file("pic"));

      
        if($app['msg']==0){
            $f_pic          = implode(',',$app['pic']);
            $data['pic']    = $f_pic;
            $data['status'] = 1;
            $data['sale']   = 0;
            if (Goods::create($data)) {
                return redirect('/agoods')->with('success','商品上传成功');
            }else{
                return redirect('/agoods')->with('error','商品上传失败');
            }
        }else{
            return redirect('/agoods')->with('error','图片上传失败');
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
        //接受收id
        $id     = $id;
        // var_dump($id);
        //获取该id的详细信息
        $pic = array();
        $info   = Goods::where('id','=',$id)->first();
        //将图片转为数组 
        $arr    = $info->pic;
        $pic['pic']    = explode(',',$arr);
        foreach ($pic as $key => $value) {
        }
        return view('Admin.goods.info',['info'=>$info,'pic'=>$value]);
    }

     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //id获取
        $id       = $id;
        // var_dump($id);
        // 实例化
        $cate     = new CategoryController();
        // 获取分类信息
        $cateinfo = $cate->getcates();
        // 获取当前的商品信息
        $good_info= DB::table('goods')->where("id","=",$id)->first();
        // 加载模板
        return view('Admin.Goods.edit',['cateinfo'=>$cateinfo,'good_info'=>$good_info]);                
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
        $data = $request->except(['_token','_method']);
        // 商品图片
        $id   = $id;
        // dd($data);
        // var_dump($id);
        //查出原来图片的路径
        $pic  = DB::table('goods')->where("id","=",$id)->value('pic');
        $pic    = explode(',',$pic);

        // var_dump($pic);die;
        // $pic[] 
        // $count  = count($pic);
        foreach ($pic as $key => $value) {
            $value = './static/admin/uploads/goods/'.$value;
            // 批量删除
            $unlink= unlink($value);
        }
        if($unlink){
             // 调用upload的方法 upload的方法在app/Libary里
            $app  = uploads($request->file("pic"));
           if($app['msg']==0){
                $f_pic          = implode(',',$app['pic']);
                $data['pic']    = $f_pic;
                $data['status'] = 1;
                $data['sale']   = 0;
                if(Goods::where("id","=",$id)->update($data)) {
                    return redirect('/agoods')->with('success','更新成功');
                }else{
                    return redirect('/agoods/$id/edit')->with('error','更新失败');
                }
            }
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
        //获取id
        $id     = $id;
        // 获取图片字段信息
        $info   = DB::table('goods')->where("id","=",$id)->select('pic')->first();
        // 将图片转为数组然后拼接路劲
        $pic    = explode(',',$info->pic);
        // $pic[] 
        // $count  = count($pic);
        foreach ($pic as $key => $value) {
            // var_dump($value)
            $value = './static/admin/uploads/goods/'.$value;
            // $arr_pic = explode(',', $pics);
            // 批量删除
            $unlink= unlink($value);
        }
        if($unlink){
            $del = DB::table('goods')->where("id",'=',$id)->delete();
            if($del){
                return redirect('/agoods')->with('success','删除成功');
            }else{
                return redirect('/agoods')->with('error','删除失败');
            }
        }

    }
}
