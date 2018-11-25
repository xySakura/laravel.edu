<?php

namespace App;

use App\Models\Attachment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

}
