<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $primaryKey='productid';
	protected $fillable=["catid",'productname','image','detail','price','saleprice','views','public'];
	public function categories()
	{
		return $this->belongsTo('App\Model\Category');
	}

	public function billdetails()
	{
		return $this->hasMany('App\Model\BillDetail');
	}
}
