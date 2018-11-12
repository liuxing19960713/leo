<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
	 protected $table="goods";

	 public function comment()
 	{
 		return $this->hasMany('App\Model\Comment','gid','id');
 	}

}
?>
