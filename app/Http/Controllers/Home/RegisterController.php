<?php
// 注册模块
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Http\Requests\Home\RegisterInsert;
use App\Model\Home\User;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Home.Register.register");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // echo '注册页面';

    }

    /**
     * Store a newly created resource in storage.
     * 处理注册信息
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterInsert $request)
    {
        $code =  $request->cookie('code');
        $codes=  $request->input('code');
        if(!$codes == $code){
            return back()->with("error","验证错误");
        }else{
            $data=$request->only(["uname","upwd"]);
            $data['upwd']  = Hash::make($data['upwd']);
            // $data['token'] = uniqid().rand(1,10000).time();
            $data['status']     = 1;
            $data['true_name']  = '会员';
            // dd($data);
            if(User::create($data)){
                return redirect("/hlogin")->with('success',"注册成功,请登录");
            }else{
                return redirect("/hregi")->with('error',"请查看用户名否正确");
            }
        }
        // var_dump(cookie());
    }

    /**
     * [验证用户是否存在]
     * @author 刘兴
     * @DateTime 2018-11-13T20:39:10+0800
     * @return 参数：1 已存在 0 不存在
     *           uname    用户
     */
    public function checkuname()
    {
        // echo $_GET['uname'];
        $uname  = $_GET['uname'];
        // if(empty($uname)){
        //     echo 2;
        // }
        // $result = preg_match($pattern,$uname,$match);

        $info  = DB::table('user')->where("uname","=",$uname)->first();

        if($info){
            echo 0;
        }else{
            echo 1;
        }
    }


    public function send()
    {
        $phone =$_GET['phone'];
        return sendsphone($phone);

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
