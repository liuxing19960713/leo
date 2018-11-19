<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\DiscountLog;
class DiscountLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取关键词
        $k = $request->input('keyword');

        // echo '123';
        // $data = DB::table('discount_log')->get();
        // dd($data);
        $data = DB::table('discount_log')->join('user','user.id','uid')->join('order','order.id','oid')->join('discount','discount.id','did')->select('discount_log.*','user.uname','order.order_code','discount.dname')->where('user.uname','like',$k.'%')->paginate(4);
        // dd($data);
        // $cdata = DiscountLog::get();
        return view('Admin.DiscountLog.index',['data'=>$data,'request'=>$request->all()]);
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
        // echo $id;
        if (DB::table('discount_log')->where('id','=',$id)->delete()) {
            return redirect('/discountlog')->with('success','删除成功!');
        }else{
            return redirect('discountlog')->with('error','删除失败');
        }
    }
   
}
