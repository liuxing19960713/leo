<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearch($id){
        // dd($id);
        $data=DB::table("category")->where('path','like',"0,$id")->get();
        $ids='';
        foreach($data as $value)
        {
            $ids.=$value->id.',';

        }
        $ids=$ids.$id;
        // dd($ids);
        $search=DB::select("SELECT * FROM goods WHERE `status`=1 and cate_id in({$ids})");
        // dd($search);
        return $search;
    }
    public function index()
    {

        $info=DB::table('goods')->where('status','=',1)->get();
        $cate=$this->getCategoryBypid(0);
        $search=$this->getSearch(7);

        // dd($search);
        //首页方法
        return view("Home.Home.index",['cate'=>$cate,'search'=>$search,'info'=>$info]);
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
        //
    }
}
