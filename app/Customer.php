<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $primaryKey='customerid';
    protected $fillable=['customername','gender','email','address','phone','note'];
    public function bills()
	{
		return $this->hasMany('App\Model\Bill');
	}
}