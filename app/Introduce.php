<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    protected $table = 'introduces';
    protected $primaryKey = 'introduceid';
    protected $fillable = ['title','content','image'];
}
