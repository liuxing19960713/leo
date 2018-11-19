<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\DiscountLog;
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
    	$uid = session('id');
    	// dd($uid);
    	return view('Home.Personal.index');
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
    public function adress(Request $request)
    {
      
        // echo $request->input($id)
        // var_dump($_GET['upid']);
        $upid = $request->input('upid');
        // echo $upid;
        //获取当前子类下的所有商品数据
        // $data=DB::table("district")->where("upid",'=',$upid)->get();
        $data = DB::table('district')->where('upid', '=', $upid)->get();
        // var_dump($data);
        return $data;
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
}
