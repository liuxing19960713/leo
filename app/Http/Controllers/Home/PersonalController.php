<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Logistics;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(session('id'));
        $uid = session('hid');

        // dd($uid);
           //公告消息
        $notice = DB::table('notice')->paginate(2);
        // 公告条数
        $count  = DB::table('notice')->where('status',"=","1")->count();
        //订单信息
        $sql = "SELECT od.price,od.gname,od.onum,o.total,od.gid,o.`status`,o.addtime,od.oid,o.order_code,od.pic FROM `user` as u,`order` as o ,odetail as od WHERE o.id = od.oid AND u.id=o.uid  AND u.id = $uid";
        $order = DB::select(DB::raw($sql));
        // dd($order);
        return view('Home.Personal.index',['notice'=>$notice,'count'=>$count,'order'=>$order]);
        // echo '个人主页'
    }
    /**
     * [confirm 确认收货]
     * @author 刘兴
     * @DateTime 2018-11-20T10:43:05+0800
     * @param    string   oid [订单id]
     * @return   [type]                          [description]
     */
    public function confirm($id)
    {
        $time = time();
        if (DB::table('order')->where("id","=",$id)->update(['status'=>3,'endtime'=>$time])) {
            return redirect("/mypersonal")->with("success","已确认收货,请填写评价吧~");
        }else{
            return redirect("/mypersonal")->with("error","服务器正在升级中，请稍后再试");
        }
    }
    /**
     * [horderinfo 订单详情]
     * @author 刘兴
     * @DateTime 2018-11-20T13:56:03+0800
     * @param    [type]                   $id [订单详情表id关联order-id]
     * @return   [type]                       [description]
     */
    public function horderinfo($id)
    {
        $sql = "SELECT *  FROM `order` AS o ,odetail AS od  where od.oid = o.id AND  o.id = $id";
        $info = DB::select($sql);
        // dd($order_info);
        $infos = "";
        $address = "";
        foreach ($info as $key => $value) {
          
            $info  = $value->address;
        }
        $infos  = $value;
        // dd($infos);
       
        // $address = $value->in
        return view('Home.Personal.horderinfo',['infos'=>$infos]);
    }
    /**
     * [logistics 查询物流信息]
     * @author 刘兴
     * @DateTime 2018-11-20T16:12:55+0800
     * @return  [com 需要查询的快递公司编号   ]
     *          [no 需要查询的快递单号]  默认返回是json
     */
    public function logistics($id)
    {
        $sql = "SELECT o.wl_type,o.wl_code,od.pic  FROM `order` AS o ,odetail AS od  where od.oid = o.id AND  o.id = $id";
        $info = DB::select($sql);
        // dd($info);
        // dd($id);
        foreach ($info as $key => $value) {
        }

        $order = $value;
        $key = "07f4dc96b3147de7151b1372454c4955"; 
        $com = $order->wl_type; 
        $no  = $order->wl_code;
        
 


        header('Content-type:text/html;charset=utf-8');
        $params = array(
          'key' =>  $key, //您申请的快递appkey
          'com' =>  $com, //快递公司编码，可以通过$exp->getComs()获取支持的公司列表
          'no'  =>  $no //快递编号
        );
        $exp = new Logistics($params['key']); //初始化类
         
        $result = $exp->query($params['com'],$params['no']); //执行查询
         
        if($result['error_code'] == 0){//查询成功
          $list = $result['result']['list'];
          
        }else{
          echo "获取失败，原因：".$result['reason'];
        }

        // var_dump($list);
        return view('Home.Personal.logistics',['list'=>$list,'order'=>$order]);

    }




    /**
     * Show the form for creating a new resource.
     *   三级联动
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
     public function city(Request $request)
    {
      
        $upid  = $request->input('upid');
        $data = DB::table('district')->where('upid','=',$upid)->get();
        echo json_encode($data);
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
        //
        // echo $id;
        $id     = $id;
        $info   = DB::table('notice')->where("id","=",$id)->first();
        // dd($info);
        $info->status = 0;
        DB::table('notice')->where("id","=",$id)->update(['status'=>0]);
        // dd($info);
        return view("/Home.Personal.notice",['info'=>$info]);
        // dd($info);

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
    /**
     * [公告详情 noteinfo]
     * @author 刘兴
     * @DateTime 2018-11-19T10:46:07+0800
     * @param    string                   $value [description]
     */
    
}
