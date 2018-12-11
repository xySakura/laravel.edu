<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseDefault extends Model
{
    protected $fillable=[
      'data','id'
    ];

    protected $casts=[
      'data'=>'array'
    ];
}
