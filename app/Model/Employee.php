<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable = [
        'name', 'email', 'phone','sallery','address','nid','joining_date','photo',
    ];

}
