<?php
	function uploads($pic)
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
                    return ['error' => '你只能上传png,jpg,gif,jpeg格式的文件'];die;
                 }
                 $destinationPath = '/static/admin/uploads/wheel'; //public 文件夹下面建 uploads/goods 文件夹
                 $extension = $value->getClientOriginalExtension();  //后缀
                 // var_dump($extension);
                 $fileName = str_random(10).'.'.$extension;//重命名
                 $fileNames[]= $fileName;
                 // var_dump($fileNames);
                 $value->move($destinationPath, $fileName);
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
