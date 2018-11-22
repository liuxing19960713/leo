<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goods = session('cart.html');
        $info  = array();
        if(!empty($goods)){
            $countprice = ""; 
            $ids  =array();
            $total="";
            $num  =array();
            foreach ($goods as $key => $value) {
                $ids[] = $value['id'];
                $num[]   = $value['cartnum'];
            }
        
            $info = DB::table('goods')->whereIn("id",$ids)->select('price','id','z_pic','goods_name')->get();
          
            foreach ($num as $key =>$val) {

                $info[$key]->num  = $val;
            }
            foreach ($info as $key => $v) {
                // var_dump($v);
                $total[]    =  $v->price * $v->num;
                $countprice += $v->price * $v->num;
                $info[$key]->total = $v->price * $v->num;
            }
            session(['cart.total'=>$total]);
            session(['cart.countprice'=>$countprice]);
            return view("Home.Cart.cart",['info'=>$info,"countprice"=>$countprice]);

        }else{
            $countprice =""; //支付总额
            $info = "";
          return view("Home.Cart.cart",['info'=>$info,"countprice"=>$countprice]);
        }
    }
    

    /**
     * 增加数量
     * @author 刘兴
     * @DateTime 2018-11-16T21:02:50+0800
     * @param    Request                  $request [description]
     * @return   [type]                            [description]
     */
    public function addcart(Request $request)
    {
        $id     = $request->input('id');
        $cart   = session("cart.html");
        foreach ($cart as $key => $value) {
            if($value['id'] == $id){
                $count = $cart[$key]['cartnum']+=1;  //商品的数量
            }
        }
        session(['cart.html'=>$cart]);
        return redirect("/hcart");

    }

      /**
     * 增加数量
     * @author 刘兴
     * @DateTime 2018-11-16T21:02:50+0800
     * @param    Request                  $request [description]
     * @return   [type]                            [description]
     */
    public function jiancart(Request $request)
    {
        $id     = $request->input('id');
        // dd($id);
        $cart   = session("cart.html");
        // var_dump($cart);
        foreach ($cart as $key => $value) {
            // var_dump($value);
            if($value['id'] == $id){

                // echo '1';die;
                if($value['cartnum']==1){
                    // dd('11');
                    $count = 1;
                }else{
                    $count = $cart[$key]['cartnum']-=1;  //商品的数量
                }
            }
           

        }
        session(['cart.html'=>$cart]);
        return redirect("/hcart");

    }
    /**
     * [删除购物车]
     * @author 刘兴
     * @DateTime 2018-11-16T21:42:55+0800
     * @return   [type]                   [description]
     */
    public function cartdel(Request $request)
    {
        $id     = $request->input('id');
        // dd($id);
        $goods  = session('cart.html');
        foreach ($goods as $key => $value) {
            // var_dump($value);die;
            if($value['id'] ==$id){
                // echo '11';
                unset($goods[$key]);

            }
        }
         session(['cart'=>$goods]);
        return redirect("/hcart");
    }

    


   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         

    }

    /**
     * 购物车页面
     * 
     * @author 刘兴
     * @DateTime 2018-11-15T22:01:38+0800
     * @param    Request                  $request [description]
     * @return   [type]                            [description]
     */
    public function checkexit($id)
    {
        //获取客户加入的商品i
        // $data = $request->only(['id','cartnum']);
        // var_dump($data);
        $goods =  session('cart.html');
        //判断session是否为空，如果为空，则返回false
        if(empty($goods)) return false;
        foreach ($goods as $key => $value) {
            // var_dump($value);
            if($value['id'] == $id){
                return true;
            }
        }

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
        $data = $request->except(['_token']);
        if(!$this->checkexit($data['id'])){
            //如果session为空，则向里面加一条信息
            $request->session()->push('cart.html',$data);
        }else{
                //拿session
                $goods = session('cart.html');
                foreach ($goods as $key => $value) {
                   if($value['id']==$data['id']){
                        $num = $value['cartnum']+$data['cartnum'];
                        $goods[$key]['cartnum'] = $num;
                        //写回session
                        session(['cart.html'=>$goods]);

                   }
            }
        }
            return redirect("/hcart"); 

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
