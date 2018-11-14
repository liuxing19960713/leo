<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //与模型关联的数据表
    protected $table = "user";

    // 该模型是否被自动维护时间戳
    public $timestamps = true;

    // 可以被批量赋值的属性。
	protected $fillable = ['uname','true_name','upwd','token','status'];

}
