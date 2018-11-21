<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入模型类Order
use App\Model\Order;

class OrderController extends Controller
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
        //订单列表
        $data=Order::where('order_code','like',"%".$k."%")->paginate(3);
        //加载后台订单列表
        //dd($data);
        return view("Admin.Order.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        //订单详情
        $data=DB::table("odetail")->where("oid","=",$id)->first();
        // dd($data);  
        //加载后台订单列表
        return view("Admin.Odetail.index",['data'=>$data]);
    }

    /**
     * Show the form for editing the specif
     * @param  int  $id
     * @return \Illuminate\Http\Responseied resource.
     *
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
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
    //Ajax修改订单状态
    public function Ajax(Request $request){
        //获取id
        
        $id =$request->input('id');
        
        $status = $request->input('status');

        // 判断状态
        $arr =[0=>'未支付',1=>'已支付',2=>'待收货',3=>'待评论',4=>'订单完成'];
        $status = array_search($status, $arr);
        $status+=1;
        if ($status >4) {
            $status = 4;
        }
        // $status = $arr[$status];

        // return json_encode($status);
        
        if (DB::table('order')->where('id','=',$id)->update(['status'=>$status])) {
            //替换 成对应的状态中文
            $status = $arr[$status];
            //传递回去数据
            return json_encode(['msg'=>'1','status'=>$status]);
        }else{
            return json_encode(['msg'=>'0']);
        }
    }
    //添加快递单号
    public function Courier($id){
      
       
        // return view('')
        //dd($id);
        $order=DB::table('order')->where('id','=',$id)->first();
        // dd($order);
        return view('Admin.Order.add',['order'=>$order]);
        // $order=DB::table('order')->where('id','=',$id)->update($data)
    }
    //存入快递单号
    public function upCourier(Request $request){
       $data=$request->except(['_token']);
       $order=DB::table('order')->where('order_code','=',$data['order_code'])->update($data);
       return redirect("/order");
    }

   
}
