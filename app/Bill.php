<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	protected $primaryKey='billid';
    protected $fillable=["customerid",'total','payment','note'];
    public function billdetails()
	{
		return $this->hasMany('App\Model\BillDetail');
	}

	public function customers()
	{
		return $this->belongsTo('App\Model\Customer');
	}
}
