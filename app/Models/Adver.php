<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adver extends Model
{
    protected $table="adver";
    protected $primaryKey="id";
    //设置是否需要自动维护时间戳
    public $timestamps=true;
    //可以批量被赋值的字段
    protected $fillable=['ad_name','adv_title','pic','commpany'];
}
