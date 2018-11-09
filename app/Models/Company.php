<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table="about";
    protected $primaryKey="id";
    //设置是否需要自动维护时间戳
    public $timestamps=true;
    //可以批量被赋值的字段
    protected $fillable=['commpany','commpany_address','com_tel','brank_conten'];
}
