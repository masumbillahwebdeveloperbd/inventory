<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	   protected $table="employees";
        protected $fillable = [
        'name', 'email','salary','address','phone','nid','joining_date','photo'
    ];
    protected $hidden=['created_at','updated_at'];
}

									