<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
       protected $table="suppliers";
        protected $fillable = [
        'name', 'email','address','phone','photo','shopname'
    ];
    protected $hidden=['created_at','updated_at'];
}
