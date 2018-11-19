
<?php
	function Uploads($pic)
	{

		$file = $pic;
		// var_dump($file);die;
        $fileNames=[];
        $msg = array();
        if(!empty($file)){
            foreach ($file as $key => $value) {
               if(!empty($value)){//此处防止没有多文件上传的情况
                 $allowed_extensions = ["png", "jpg", "gif","jpeg"];
                 if ($value->getClientOriginalExtension() && !in_array($value->getClientOriginalExtension(), $allowed_extensions)) {

                    return redirect('/agoods')->with('error','You may only upload png, jpg,jpeg or gif.');die;
                 }
                 $destinationPath = './static/admin/uploads/goods'; //public 文件夹下面建 uploads/goods 文件夹
                 $extension = $value->getClientOriginalExtension();  //后缀
                 // var_dump($extension);
                 $fileName = str_random(10).'.'.$extension;//重命名
                 // 数组存的是什么？
                 //存的只是图片名字
                 $fileNames[]= $fileName;

                 $value->move($destinationPath, $fileName);
                 // dd($bool);
                 if($value){
                     $arr['msg'] = 1;
                 }

                 // $filePath = asset($destinationPath.$fileName);
                 // $post['landlord_img']="storage/uploads/".$fileName;
                 // $list=array('img_name'=>$fileName,'house_id'=>$id);

                 // DB::table('img')->insert($list);
             }

          }
        }else{

          $arr['msg'] = 0;
        }

        $arr['pic']=$fileNames;
        return array('pic'=>$fileNames,'msg'=>$arr);
	}





?>

