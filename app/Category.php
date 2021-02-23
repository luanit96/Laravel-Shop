<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $primaryKey='catid';
	protected $fillable=['catname','parent','orderitem','haschild','public'];
	public function products()
	{
		return $this->hasMany('App\Model\Product');
	}
}
