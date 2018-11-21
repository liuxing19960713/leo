<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Personaladdress extends Model
{
     //与模型关联的数据表
    protected $table = "user_address";
     // 该模型是否被自动维护时间戳
    public $timestamps = true;
     // 可以被批量赋值的属性。
	protected $fillable = ['uid','linkname','address','mailbox','phone','isDefault'];
}
