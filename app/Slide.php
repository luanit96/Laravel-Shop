<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	protected $table='slides';
	protected $primaryKey='slideid';
	protected $fillable=['slidename','link','image'];
}
