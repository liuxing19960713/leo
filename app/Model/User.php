<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	 protected $table="user";

	 public function comment()
 	{
 		return $this->hasMany('App\Model\Comment','uid','id');
 	}

}
?>
