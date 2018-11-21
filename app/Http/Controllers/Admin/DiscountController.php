<?php
//优惠券模块
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入Model
use App\Model\Discount;
use DB;
// 引入校验类
use App\Http\Requests\DiscountAdd;
class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     * 优惠券列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 测试是否有反关联
        // $info = Discount::find(2);
        // dd($info->category->name);
        //dd(1);
        $c = '';
        $k = $request->input('keyword');
        $cid = [];
        // dd(isset($k));
        if (isset($k)) {
            $c = DB::table('category')->where('name','like',$k.'%')->pluck('id');
             // 遍历cid
             // dd($c);
            foreach ($c as $v) {
                $cid[]=$v;
            }
             $data = Discount::whereIn('cid',$cid)->paginate(4);
        }else{
              $data = Discount::paginate(4);
        }
        // echo  '优惠券列表';
        // $data = Discount::whereIn('cid',$cid)->paginate(4);
        // dd($data);
        return view('Admin.Discount.index',['data'=>$data,'request'=>$request->all()]);
    }
    /**
     * [sta ajax禁用方法]
     * @author 余伟强
     * @DateTime 2018-11-21T10:42:34+0800
     * @param    Request                  $request [description]
     * @return   [type]                            [description]
     */
    public function sta(Request $request){

                // ($request->input('sta'));
        $id = $request->input('id');
        $sta = $request->input('sta');
        // 把状态换回数字并且更改状态
        $sta = ($sta=='禁用'?'1':'0');
        // return ($sta);
        if (DB::table('discount')->where('id','=',$id)->update(['status'=>$sta])) {
            // 把状态切换回状态
            $sta = ($sta==1?'启用':'禁用');
            return json_encode(['msg'=>1,'sta'=>$sta]);
        }else{
            return json_encode(['msg'=>0]);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = DB::table('category')->where('pid','=',0)->get();
        // dd($data);
        return view('Admin.Discount.add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountAdd $request)
    {
        // dd($request->all());
        $data = $request->except(['_token','curr_date']);
        // 增加dname 字段
        // dd($data);
        // $data
        $max = ($data['max']);
        $minus = $data['minus'];
        $data['dname']='满'.$max.'减'.$minus;
        // dd($data);
        if (DB::table('discount')->insert($data)) {
            return redirect('/discount')->with('success','优惠券添加成功!');
        }else{
            return redirect('/discount/create')->with('error','优惠券添加失败!');
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
        // echo '修改页';
        // dd($id);
        $id=$id;
        // 查询所有顶级分类
        $cc = DB::table('category')->where('pid','=',0)->get();
        // dd($cc);
        $data = Discount::where('id','=',$id)->first();
        // dd($data);
        return view('Admin.Discount.edit',['data'=>$data,'cc'=>$cc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountAdd $request, $id)
    {
        // dd($request->all());
        $data = $request->except(['_token','_method','curr_date']);
        // dd($data);
        if (DB::table('discount')->where('id','=',$id)->update($data)) {
            return redirect('/discount')->with('success','修改成功');
        }else{
            return redirect('/discount/'.$id.'/edit')->with('error','修改失败');
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
        // echo $id;
        if (DB::table('discount')->where('id','=',$id)->delete()) {
            return redirect('/discount')->with('success','删除优惠券成功!');
        }else{
            return redirect('/discount')->with('error','删除优惠券失败!');
        }
    }
}
