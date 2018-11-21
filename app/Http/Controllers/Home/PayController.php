<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //结算页
    public function index(Request $request)
    {
        // echo "11";
        //查出商品相关信息
        $goods = session('cart.html');
        $total=session('cart.total');
        $countprice=session('cart.countprice');
        $info  = array();
        $ids  =array();
        $num  =array();
        $minus=0;
        foreach ($goods as $key => $value) {
                $ids[] = $value['id'];
                $num[]   = $value['cartnum'];
            }
        $info = DB::table('goods')->whereIn("id",$ids)->select('price','id','z_pic','goods_name')->get();
        foreach ($num as $key =>$val) {

                $info[$key]->num  = $val;
            }
        //查询用户默认地址信息
        $uid=session('hid');
        $data=DB::table('user_address')->where('uid','=',$uid)->where('isDefault','=',1)->get();
        // dd($data);
        //查询优惠券
        $demo=DB::table('discount_log')->join('discount','discount_log.did','=','discount.id')->select('discount_log.name','discount.max','discount.minus','discount_log.did')->where('uid','=',$uid)->get();
        //处理优惠券数据
        if ($request->input('minus')) {
            $minus=$request->input('minus');
        }
        $countprice=$countprice-$minus;

        if ($request->input('did')) {
            session(['order.did'=>($request->input('did'))]);
        }
        session(['order.info'=>$info]);
        session(['order.count'=>$countprice]);
        session(['order.address'=>$data]);
        // dd(session('order.address'));
        return view("Home.Pay.index",['info'=>$info,'total'=>$total,'data'=>$data,'demo'=>$demo,'countprice'=>$countprice,'minus'=>$minus]);
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //支付宝 接口调用
    public function pays(Request $request)
    {   
        if ($request->input('id')) {
            //未支付订单支付
            $demo=DB::table('order')->where("id","=",$id)->first();
            foreach ($demo as $v) {
                $order_code=$v->order_code;
            }

        } else {  
            //将订单信息存入数据库
            $order_code=time().rand(1,100000);
            $addtime=time();
            $info=session('order.info');
            $status=0;
            $address=session('order.address');
            foreach ($address as  $value) {
                
            }
            // dd(session('order'));
            $id = DB::table('order')->insertGetId( ['did' =>session('order.did'), 'uid' =>$value->uid,'linkname'=>$value->linkname,'address'=>$value->address,'tel'=>$value->phone,'status'=>$status,'order_code'=>$order_code,'total'=>session('order.count'),'addtime'=>$addtime]);
            //将订单详情存入库中
            foreach ($info as  $value) {
                DB::table('odetail')->insert(['oid'=>$id,'gid'=>$value->id,'pic'=>$value->z_pic,'onum'=>$value->num,'price'=>$value->price,'gname'=>$value->goods_name]);
            }
            // dd($id);
            
            session()->pull('cart'); 
            session()->pull('order');
        }
        session(['code'=>$order_code]);    
        //商户订单号
        $out_trade_no=$order_code;
        //订单名称
        $subject='灯饰人生';
        //付款金额
        $total_fee=0.01;
        //商品描述
        $body="灯饰人生，照亮你的美";
        pay($out_trade_no,$subject,$total_fee,$body);
    } 
    //通知界面
    public function returnurl(Request $request)
    {
        // echo "支付成功";
        $order_code=session('code');
        $list=DB::table('order')->where("order_code","=",$order_code)->first();
        //改变订单状态为1
        DB::table('order') ->where("order_code","=",$order_code) ->update(['status' => 1]);
        // dd($list);
        return view("Home.Pay.returnurl",['list'=>$list]);
    }

    public function create(Request $request)
    {
         

    }
    /**
     * Store a newly created resource in storage.
     *     id  商品id
     *     cartnum 购买数量 

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    //支付宝 接口调用
    public function pays(){
        //商户订单号
        $out_trade_no=87955251;
        //订单名称
        $subject=195471794;
        //付款金额
        $total_fee=0.01;
        //商品描述
        $body="jaj28568ja";
        pay($out_trade_no,$subject,$total_fee,$body);
    } 
    //通知界面
    public function returnurl(){
        echo "支付成功";
    }


}
