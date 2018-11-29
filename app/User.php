<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collect;
use App\Models\Like;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable,Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at','icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIconAttribute( $key )
    {
        return $key?:asset('org/images/3.jpg');
    }

    //关联附件
    public function attachment(){
        //return $this->hasMany(Attachment::class);
        return $this->hasMany(Attachment::class);
    }

    //关注处理
    //关联中间表
    public function followed(){
        return $this->belongsToMany(User::class,'follows','user_id','following_id');
    }

    public function following(){
        return $this->belongsToMany(User::class,'follows','following_id','user_id');
    }

    public function like(){
        return $this->hasMany(Like::class);
    }


    public function collect(){
        //第一个参数关联模型,第二个参数位数据表关联字段前缀
        return $this->hasMany(Collect::class);
    }
}
