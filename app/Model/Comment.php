<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
 	protected $table="comment";

 	public function user()
 	{
 		return $this->belongsTo('App\Model\User','uid','id');
 	}

 	public function goods()
 	{
 		return $this->belongsTo('App\Model\Goods','gid','id');
 	}
}
?>
