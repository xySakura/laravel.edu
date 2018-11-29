<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $fillable=[
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function article(){
        //第一个参数关联模型,第二个参数位数据表关联字段前缀
        return $this->morphMany(Article::class,'collect');

    }
}
