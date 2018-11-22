<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Hash;

use App\Http\Requests\Home\UserInfoInsert;
use Logistics;

use App\Model\DiscountLog;
// 添加地址管理的Model
use App\Model\Home\Personaladdress;
// 引入地址添加校验类
use App\Http\Requests\Home\AddressInsert;
// 引入地址修改校验类
use App\Http\Requests\Home\AddressEdit;

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


        $user1=DB::table('user')->where('uname','=',session('username'))->first();
        
        //dd($user->id);
        // $goods=DB::table('cogoods')->join('goods','goods.id','cid')->select('cogoods.*','goods_name')->where('uid','=',$uid);
        $cogoods=DB::table('cogoods')->where('uid','=',$user1->id)->get();
        //dd($cogoods);
       $cogoods=DB::table('cogoods')->join('goods','goods.id','gid')->select('cogoods.*','goods.goods_name','goods.price','goods.z_pic','goods.id')->get();

        

        //dd($goods);
        //dd($cogoods);

        //dd($order);
        // dd($uid);
     
        $uid = session('hid');

        /*******************************************/
        // 查询该用户拥有的所有优惠券
        $Log = DB::table('discount_log')->where('uid','=',$uid)->join('discount','discount_log.did','=','discount.id')->select('discount_log.*','discount.status as dstatus','discount.max','discount.minus','discount.start_time','discount.end_time','discount.describe','discount.cid')->get();

        //$Log->first() 是判断是否为空
        if ($Log->first()) {
            // dd('不为空');
            // dd($Log);
            $Log = $Log;
        }else{
            // dd($Log);
            $Log = '';
        }

        //公告消息
        $notice = DB::table('notice')->paginate(2);
        // 公告条数
        $count  = DB::table('notice')->where('status',"=","1")->count();
        /*******************************************/
        //订单信息
        $sql = "SELECT od.price,od.gname,od.onum,o.total,od.gid,o.`status`,o.addtime,od.oid,o.order_code,od.pic FROM `user` as u,`order` as o ,odetail as od WHERE o.id = od.oid AND u.id=o.uid  AND u.id = $uid";
        $order = DB::select(DB::raw($sql));
        /*****用户详情开始*****************************/
        //查询用户详情
        $user = DB::table('user_info')->where('uid','=',$uid)->first();
        if ($user) {
            $user = $user;
        }else{
            $user = '';
        }
        // dd($user);

        /***用户详情结束*****************************/

        // dd($order);


        return view('Home.Personal.index',['notice'=>$notice,'count'=>$count,'order'=>$order,'user'=>$user,'uid'=>$uid,'cogoods'=>$cogoods,'Log'=>$Log]);


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
        $sql = "SELECT *  FROM `order` AS o ,odetail AS od, discount AS d where od.oid = o.id AND d.id=o.did AND  o.id = $id";
        $info = DB::select($sql);
        // dd($order_info);
        $infos = "";
        $address = "";
        foreach ($info as $key => $value) {
          
            $info  = $value->address;
        }
        $infos  = $value;
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
        // dd($id);
        foreach ($info as $key => $value) {
        }

        $order = $value;
        $key = "07f4dc96b3147de7151b1372454c4955"; 
        $com = $order->wl_type; 
        $no  = $order->wl_code;
        
 

        $list = array();
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

        return view('Home.Personal.logistics',['list'=>$list,'order'=>$order]);

    }
    /**
     * [huserinfo 用户详情信息编辑]
     * @author 刘兴
     * @DateTime 2018-11-21T14:05:34+0800
     * @param    [type]                   $id [description]
     * @return   [type]                       [description]
     */
    public function huserinfo($id)
    {
        // dd($id);
        return view('Home.Personal.huserinfo',['id'=>$id]);
    }
    /**
     * [hsaveuser 个人信息保存]
     * @author 刘兴
     * @DateTime 2018-11-21T15:25:42+0800
     * @param    UserInfoInsert           $request [description]
     * @return   [type]                            [description]
     */
    public function hsaveuser(UserInfoInsert $request)
    {
        
        $user = $request->except(['_token']);
     // dd($user);
        if(DB::table("user_info")->insert($user)){
            return redirect("/mypersonal")->with("success","添加成功");
        }else{
            return redirect("/huserinfo/{{$id}}")->with("添加失败");
        }

    }

    public function hupuser(Request $request)
    {
        $uid    = $request->input('uid');
        $user   = $request->except(['_token','uid']);
        // dd($uid);
        $update = DB::table('user_info')->where("uid","=",$uid)->update($user);
        if ($update) {
            return redirect("/mypersonal")->with("success","更新成功");
        } else{
            return redirect("/mypersonal")->with("error","更新失败");
        }
        // dd();
    }




    /**
     * Show the form for creating a new resource.
     *   三级联动
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
      
    }

    public function city(Request $request)
    {

        $upid  = $request->input('upid');
        $data = DB::table('district')->where('upid','=',$upid)->get();
        // $arr1=settype($data,'array');
        // dd($arr1);
        return json_encode($data);
    }

    public function haddaddress(){
        // echo '地址管理';
        return view('Home.Personal.addaddress');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // 添加送货地址

    public function store(AddressInsert $request)
    {
        $data = $request->except(['_token','xiang','city']);
        $uid = $request->input('uid');
        // dd($request->all());
        $city = $request->input('city');
        // dd(gettype($city));
        $citys = (str_replace('--请选择--', '', $city));
        $citys = (str_replace(',' , '', $citys));
        // dd($citys);
        $xi = $request->input('xiang');
        // dd($xi);
        $data['address']=$citys.$xi;
        // $data
        // dd($request->all());
        //获取该用户是否已经拥有了地址
        //默认第一个添加的地址是默认地址
        //
        $info = Personaladdress::where('uid','=',$uid)->get();
        // 要判断是否有默认地址  如果没有的话 就把这个新添加的变为默认地址
        // dd(123);
        // 获取当前用户的所有的默认字段
        $default = Personaladdress::where('uid','=',$uid)->where('isDefault','=',1)->get();

        // dd($default);

        if($info->count()){
            // dd('不为空');
            // 0为非默认地址
            // 不为空的时候还要判断是否有默认地址
            if ($default->count()) {
                $data['isDefault']=0;
            } else {
                 $data['isDefault']=1;
            }
        }else{
            // 1为默认
            $data['isDefault']=1;
            // dd('为空');
        }
        // dd($data);
        if (Personaladdress::create($data)) {
            // dd('插入成功');
            return redirect('/haddress/'.$uid)->with('success','添加成功');
        }else{
            // dd('插入失败');
            return redirect('/haddress/'.$uid)->with('error','添加失败');

        }


    }

    // 这是管理地址页面
    public function haddress($uid){
        // dd($request->all());
        $id = $uid;
        // dd($id);
        $address = DB::table('user_address')->where('uid','=',$uid)->get();
        if ($address->first()) {
            $address = $address;
        }else{
            $address = '';
        }


        // dd($address);

        return view('Home.Personal.address',['address'=>$address]);

    }
    // 管理页面地址删除
    public function haddressdel($uid,$aid)
    {
        // dd($request->all());
        $uid = $uid;
        $aid = $aid;
        // dd($aid);
        // dd($uid);
        if ($uid == session('hid')) {
            if (Personaladdress::destroy($aid)) {
                return redirect('/haddress/'.$uid)->with('success','删除成功');
            }else{
                return redirect('/haddress/'.$uid)->with('error','删除失败');
            }
        }else{
            return redirect('/mypersonal')->with('error','数据出错');
        }

    }
   
    // 修改默认地址
    public function haddressmo($aid)
    {
        // dd($aid);
        $uid = session('hid');
        //更新旧的默认地址的默认字段变为不是默认
        if (Personaladdress::where('isDefault','=',1)->update(['isDefault'=>0])) {
            // dd('更新成功');
            // 更新该字段
            if (Personaladdress::where('id','=',$aid)->update(['isDefault'=>1])) {
                return redirect('/haddress/'.$uid)->with('success','设置默认地址成功');
            }else{
                return redirect('/haddress/'.$uid)->with('error','数据出错');
            }
        }else{
            // dd('更新失败');
            // 走这里的都是没有默认中的情况下的时候
            if (Personaladdress::where('id','=',$aid)->update(['isDefault'=>1])) {
                return redirect('/haddress/'.$uid)->with('success','设置默认地址成功');
            } else{
                 return redirect('/haddress/'.$uid)->with('error','数据出错');
            }

        }

    }
    // 收货地址的修改
    public function haddressedit($uid,$aid)
    {
        $uid = $uid;
        $aid = $aid;
        // dd($aid);

        $address = Personaladdress::find($aid);
        if ($address->first()) {
                $address = $address;
        }else{
            $address = '';
        }
        // dd($address);
        return view('Home.Personal.editaddress',['address'=>$address,'aid'=>$aid]);
    }
    // 收货地址修改的页面
    public function haddressupdate(AddressEdit $request,$aid)
    {
        // dd($aid);
        // dd($request->all());
        // $aid = '';
        $aid = $aid;
        $uid = session('hid');
        $data = $request->except(['uid','_token']);
        // dd($data);
        if ($uid == $request->input('uid')) {
            if (Personaladdress::where('uid','=',$uid)->where('id','=',$aid)->update($data)) {
                // dd('更新成功!');
                return redirect('/haddress/'.$uid)->with('success','更新成功');
            }else{
                // dd('更新失败');
                return redirect('/haddress/'.$uid)->with('error','更新失败');
            }
        }
    }

    //修改密码页面
    public function changepwd($uid)
    {
        // echo '修改密码页面';
        // dd($uid);
        $info = DB::table('user')
        ->where('id','=',$uid)
        ->select('id','uname')->first();
        // dd($info);
        return view('Home.Personal.changepwd',['info'=>$info]);
    }
    //

    // 发送验证码 方法
    public function exem(Request $request)
    {
        $num = $request->input('num');
        // return json_encode($num);
        $uid = $request->input('id');
        if (DB::table('user')
            ->where('uname','=',$num)
            ->where('id','=',$uid)
            ->first()) {
             // sendsphone($num);
            // dd('ok!');
            // return json_encode('ok');
            // 发送验证码

            $bool = sendsphone($num);

            return json_encode($bool);
        }else{
            // return json_encode('error');
            return redirect('/mypersonal')->with('error','数据出错');
        }
    }

    // 验证校验码是否正确并且 跳转到修改页面
    public function editpwd(Request $request)
    {
        // dd($request->all());
        $uid = $request->input('uid');
        // dd($uid);
        $code = ($request->cookie('code'));
        // dd($code);

        $exm = $request->input('exm');

        if ( $exm == $code ) {
            // dd(1);
            return view('Home.Personal.editpwd');
        }else{

             return redirect('/mypwdchange/'.$uid)->with('error','验证码出错!');
        }
    }

    //修改密码加验证

    public function upwd(Request $request)
    {
        // dd($request->all());
        // 查看原密码

        $newpwd = $request->input('newpwd');

        $renewpwd = $request->input('renewpwd');
        $uid = session('hid');

        $res = DB::table('user')->where('id','=',$uid)->first();

        if ($newpwd == $renewpwd) {

            $pwd['upwd'] = Hash::make($newpwd);
            if (DB::table('user')->where('id','=',$uid)->update($pwd)) {
                return redirect('/mypersonal')->with('success','更改密码成功');
            }else{
                return redirect('/mypwdchange/'.$uid)->with('error','密码更新失败');
            }
        }else{
            return redirect('/mypwdchange/'.$uid)->with('error','数据出错');
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
    

     //用户优惠卷ajax添加
    public function ajax(Request $request){
        // echo json_encode(['status'=>1, 'msg'=>'成功']);exit;
        // 获取用户id
        $uid = session('hid');
        // 优先判断是否登录了
        if (!empty($uid)) {
            // 获取did 优惠券id  
             $did=$request->input('id');
             //dd(input::all());
             //dd($id);
             
             $discount=DB::table('discount')->where('id','=',$did)->first();
             
             $data['did']=$did;
             $data['name']=$discount->dname;
             $data['status']=1;
             $data['uid']=session('hid');
             // 查询所有该用户的拥有的优惠券  有的话就不能再领取了
             $dlogs = array();
             $dd = DB::table('discount_log')->where('id','=',session('hid'))->pluck('did');
             foreach ($dd as  $ds) {
                    $dlogs = $ds;
             }
             // 判断该优惠券是否已经领取
                if (in_array($did,$dlogs)) {
                    
                    //在数组里面的话就是已经领取了
                    return json_encode(['msg'=>3]);

                }else{
                    // 不存在就领取  插入数据库
                     if (DiscountLog::create($data)) {
                        return json_encode(['msg'=>1]);
                     }else{
                        return json_encode(['msg'=>0]);
                     }
                }
            // return json_encode(['uid'=>$data['uid']]);
             // if (DiscountLog::create($data)) {
             //    return json_encode(['msg'=>1]);
             // }else{
             //    return json_encode(['msg'=>0]);
             // }

             // else是没有登录的
        }else{

            return json_encode(['msg'=>2]);
        }
        
        
    }

    //用户收藏商品
    public function cogoods(Request $request){
        if(empty(session('username'))){
            return json_encode(['msg'=>4]);
        }
        
        $id=$request->input('id');
        //通过传递的id查商品id
        $goods=DB::table('goods')->where('id','=',$id)->first();
        
        //查出执行收藏操作的用户id
        $user=DB::table('user')->where('uname','=',session('username'))->first();
        
      
        $cogoods['uid']=$user->id;
        //dd($id);
        $cogoods['gid']=$goods->id;

        $cogoods['create_at']=date('Y-m-d,H:i:s',time());
        $cogood=DB::table('cogoods')->where('uid','=',$user->id)->where('gid','=',$goods->id)->first();
         
         //商品已收藏，删除选择
        if(!empty($cogood)){
            if(DB::table('cogoods')->delete($cogood->id)){
                return json_encode(['msg'=>0]);
            }else{
                return json_encode(['msg'=>1]);
            }
        }else{
            //将数据添加进用户收藏表
            if(DB::table('cogoods')->insert($cogoods)){
                return json_encode(['msg'=>2]);
            }else{
                return json_encode(['msg'=>3]);
            }
        }
    }



}
