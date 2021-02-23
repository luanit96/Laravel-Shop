<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contacts';
	protected $primaryKey='contactid';
	protected $fillable=['fullname','email','phone','detail'];
}
