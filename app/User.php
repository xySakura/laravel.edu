<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collect;
use App\Models\Like;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,Searchable,HasRoles;

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

    public function role(){

       return $this->belongsToMany(Role::class,'model_has_roles','model_id','role_id');
    }

    /**
     * 获取将存储在JWT主题声明中的标识符.
     * 就是⽤用户表主键 id *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * 返回⼀一个键值数组，其中包含要添加到JWT的任何⾃自定义声明. *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
