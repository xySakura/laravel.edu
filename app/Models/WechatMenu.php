<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatMenu extends Model
{
    protected $fillable = [
        'title','data','status'
    ];
}
