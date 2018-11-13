<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table="notice";
    protected $primaryKey="id";
    //设置是否需要自动维护时间戳
    public $timestamps=true;
    //可以批量被赋值的字段
    protected $fillable=['title','content'];
}
