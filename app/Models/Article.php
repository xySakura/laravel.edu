<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
    use LogsActivity,Searchable;

    protected $fillable = ['title','content','id'];
    //如果需要记录所有$fillable设置的填充属性，可以使用
    protected static $logFillable = true;
    protected static $recordEvents = ['created','updated'];
    //自定义日志名称
    protected static $logName = 'article';

    public function user(){
        return $this->belongsTo(User::class);
    }

    //定义栏目关联
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function like(){
        //第一个参数关联模型,第二个参数位数据表关联字段前缀
        return $this->morphMany(Like::class,'like');
    }

    public function collect(){
        //第一个参数关联模型,第二个参数位数据表关联字段前缀
        return $this->morphMany(Collect::class,'collect');
    }

    //通知跳转连接
    public function getLink($param){
        return route('home.article.show',$this).$param;
    }
}
