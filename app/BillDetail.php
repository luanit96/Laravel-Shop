<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
	protected $primaryKey='bill_detailid';
	protected $fillable=["billid","productid",'quantity','price'];
    public function bills()
	{
		return $this->belongsTo('App\Model\Bill');
	}

	public function products()
	{
		return $this->hasMany('App\Model\Product');
	}
}
