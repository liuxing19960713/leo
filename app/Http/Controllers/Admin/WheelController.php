<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Wheel;
//加载Storage 类 用来上传和删除文件
use Illuminate\Support\Facades\Storage;
// 获取config类来获取上传路径
use Config;
// 加载插入校验类
use App\Http\Requests\WheelInsert;
// 加载修改校验类
use App\Http\Requests\WheelEdit;
class WheelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 主页
        // 获取关键词
        $k = $request->input('keywords');
        // echo 'this is 轮播图';
        // 获取数据
        $data = Wheel::where('l_name','like','%'.$k.'%')->paginate(4);
        // dd($data);
        return view('Admin.Admin.Wheel.wheel',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Admin.Wheel.wheeladd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WheelInsert $request)
    {
        // 获取上传的文件夹路径

        $path = Config::get('app.wheeluploads');
        // dd($path);
        //
        // 获取l_name 和 status 两个字段
        $data=($request->except(['_token','pic']));

        // 判断是否有文件上传
        // dd($request->hasFile('pic'));
        if ($request->hasFile('pic')) {

             // 查看上传的文件
            // dd($request->file('pic'));
            //
            // 下面是做上传图片的验证 像素验证
            // $this->validate($request,['pic'=>'dimensions:min_width=500,min_height=500']);
            //
            // 获取所有上传的图片
            $file = $request->file('pic');
            // 做是否符合文件的验证
            $arr = ['jpg','jpeg'];
            // 遍历多文件
            foreach ($file as  $v) {
                // 这是新的图片文件名字 重点是文件名字  不是 名字(名字是显示出现标志是哪个而已)
                $name = md5(time().uniqid());
                // 判断是否有超大
                $size = $v->getSize();
                // 把size转换为M
                $M=($size/1000/1000);
                // 获取后缀
                $ext=$v->getClientOriginalExtension();
                if ($M > 10) {
                    return redirect('/wheel/create')->with('error','请上传不超过10M大小的图片');

                // dd($size);
                // // 判断是否符合相关类型
                }elseif(in_array($ext,$arr)){

                    // 数据库最后一个需要添加的字段 l_pic(这是路径+文件名)
                    $data['l_pic']=$path.$name.'.'.$ext;
                    // dd($data);
                    if (Wheel::create($data)) {
                        // 移动到指定目录下
                        $v->move($path,$name.'.'.$ext);
                        return redirect('/wheel')->with('success','添加成功');
                    }else{
                        return redirect('/wheel')->with('error','添加失败');
                    }

                }else{
                    // echo '不是适合的图片类型';
                    return redirect('/wheel/create')->with('error','请上传jpg或者jpeg属性的图片');
                }

            }


        }else{
            return redirect('/wheel/create')->with('error','请上传图片');
        }


        // 开始文件上传
        // dd($request->file('pic')->store($path));
        // 设置文件上传名字
        // $pathname = time().
    }
    // 修改状态
    public function Ajax(Request $request)
    {
        // echo json_encode($request->input('sta'));
        $id = $request->input('id');
        $sta = $request->input('sta');
        $arr = [ 0=>'禁用' , 1=>'启用' ];
        // sta 转换成中文
        $sta = array_search($sta, $arr);
        // return json_encode($sta);
        // 判断不能超过1
        if ($sta == 0) {
            $sta = 1;
        }else{
            $sta = 0;
        }
        if ($sta > 1 || $sta < 0) {
            return redirect('/wheel')->with('error','数据出错,请联系管理员');
        }
        // 修改数据库
        if (Wheel::where('id','=',$id)->update(['status'=>$sta])) {
            // 把sta转换为中文
            $sta = $arr[$sta];

            return json_encode(['msg'=>1,'sta'=>$sta]);
        }else{
            return json_encode(['msg'=>0]);
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
        //这是修改页
        // echo '修改页';
        $data = Wheel::where('id','=',$id)->first();
        // dd($data);

        return view('Admin.Admin.Wheel.wheeledit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WheelEdit $request, $id)
    {
        // dd($request->all());
        // 判断是否有图片上传
        if ($request->hasFile('pic')) {
            // 获取上传的文件夹路径
            $path = Config::get('app.wheeluploads');
            //获取没有只有l_namel_pic 的data
            $data = $request->except(['_token','_method','pic']);
             // 获取所有上传的图片
            $file = $request->file('pic');
            // 做是否符合文件的验证
            $arr = ['jpg','jpeg'];
            // 获取旧图片的路径
            $old = Wheel::where('id','=',$id)->first()->value('l_pic');
            // dd($old);
            // 遍历多文件
            foreach ($file as  $v) {
                // 这是新的图片文件名字 重点是文件名字  不是 名字(名字是显示出现标志是哪个而已)
                $name = md5(time().uniqid());
                // 判断是否有超大
                $size = $v->getSize();
                // 把size转换为M
                $M=($size/1000/1000);
                // 获取后缀
                $ext=$v->getClientOriginalExtension();
                if ($M > 10) {
                    return redirect("wheel/{$id}/edit")->with('error','请上传不超过10M大小的图片');

                // dd($size);
                // // 判断是否符合相关类型
                }elseif(in_array($ext,$arr)){

                    // 数据库最后一个需要添加的字段 l_pic(这是路径+文件名)
                    $data['l_pic']=$path.$name.'.'.$ext;
                    // dd($data);
                    if (Wheel::where('id','=',$id)->update($data)) {
                        unlink($old);
                        // 移动到指定目录下
                        $v->move($path,$name.'.'.$ext);

                        return redirect('/wheel')->with('success','修改成功');
                    }else{
                        return redirect("/wheel/{$id}/edit")->with('error','修改失败');
                    }

                }else{
                    // echo '不是适合的图片类型';
                    return redirect("/wheel/{$id}/edit")->with('error','请上传jpg或者jpeg属性的图片');
                    }
            }

        }else{
            // 没有图片上传,就是纯粹的修改名字状态

            // echo '没有图片上传';
            // dd($request->all());
            $data = $request->except(['_token','_method']);
            // dd($data);
            //更新
            if (Wheel::where('id','=',$id)->update($data)) {
                return redirect('/wheel')->with('success','修改成功!');
            }else{
                return redirect("/wheel/{$id}/edit")->with('error','修改失败,请修改至少一项,如不需要修改请返回');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取id
        // echo $id;
        //获取对应的图片路径
        $path = Wheel::where('id','=',$id)->value('l_pic');
        // 获取对应的图片名字
        $name = Wheel::where('id','=',$id)->value('l_name');
        // dd($name);
        // 先把数据库的删除了 在删除文件
        if (Wheel::where('id','=',$id)->delete()) {
            // 如果成功的话继续删除文件
            if (unlink($path)) {
                // dd('删除成功');
                return redirect('/wheel')->with('success','删除图片成功');
            }else{
                // dd('删除图片失败');
                return redirect('/wheel')->with('error','删除图片失败');
            }
        }
    }
}
