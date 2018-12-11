<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable=['name','type'];

    //自动回复关键词
    public function keyword(){
        return $this->hasMany(Keyword::class);
    }

    //自动回复文本
    public function responseText(){
        return $this->hasMany(ResponseText::class);
    }

    //自动回复图文
    public function responseNews(){
        return $this->hasMany(ResponseNews::class);
    }
}
