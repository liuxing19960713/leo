<?php
// 登录模块
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入验证码
use Gregwar\Captcha\CaptchaBuilder;
use DB;
use Hash;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("Home.Login.login");
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
     * 验证码的引入
     * @author 刘兴
     * @DateTime 2018-11-14T18:13:11+0800
     * @param    string                   $value [description]
     * @return   [type]                          [description]
     */
    public function code()
    {
        ob_clean();
        $builder = new CaptchaBuilder;
        //设置图片的宽高以及字体
        $builder->build($width = 200, $height = 50, $font = null);
        // 获取验证码的内容
        $phrase  = $builder->getPhrase();
        //把验证码内容储存在session里
        session(['vcode'=>$phrase]);
        // 生成图片
        header("Cache-Controller: no-cache,must-revalidate");
        header('Content-Type: image/jpeg');
        //生成验证码图片
        $builder->output();
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
        
        $vcode = session('vcode');
        $code  = $request->input('vcode');
        // echo $vcode.':'.$code;
        if($code!=$vcode){
            return back()->with('error',"验证码不一致");
        }else{
            $name = $request->input('uname');
            // dd($name);
            $info = DB::table('user')->where('uname',"=",$name)->first();
            $pwd  = $request->input('upwd');

            if($info){
                // echo 11;
                if(Hash::check($pwd,$info->upwd)){
                    
                    session(['hid'=>$info->id]);//
                    session(['username'=>$info->uname]);
                    return redirect("/");
                }else{
                    return redirect("/hlogin")->with('error',"密码错误");
                }
            }
        }
    }

    //检验校验码
    public function chvcode(Request $request)
    {
        $vcode = $request->input('vcode');
        // echo $vcode;
        $code  = session('vcode');
        // if()
        // echo($code);
        if($code == $vcode){
            echo 1;
        }elseif(empty($vcode)){
            echo 2;
        }elseif($code!=$vcode){
            echo 3;
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
