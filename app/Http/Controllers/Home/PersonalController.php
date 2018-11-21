<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
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
        $uid = session('hid');
        // dd($uid);
        // 查询该用户拥有的所有优惠券
        $Log = DB::table('discount_log')->where('uid','=',$uid)->join('discount','discount_log.did','=','discount.id')->select('discount_log.*','discount.status as dstatus','discount.max','discount.minus','discount.start_time','discount.end_time','discount.describe','discount.cid')->get();
        // dd($Log);
           //公告消息
        $notice = DB::table('notice')->get();
        //$Log->first() 是判断是否为空
        if ($Log->first()) {
            // dd('不为空');
            // dd($Log);
            $Log = $Log;
        }else{
            // dd($Log);
            $Log = '';
        }


        return view('Home.Personal.index',['notice'=>$notice,'Log'=>$Log]);
        // echo '个人主页'
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
}
