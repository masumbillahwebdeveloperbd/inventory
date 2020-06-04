<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
       protected $table="customers";
        protected $fillable = [
        'name', 'email','address','phone','photo'
    ];
    protected $hidden=['created_at','updated_at'];
}
