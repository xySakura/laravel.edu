<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    public function make(Request $request){
        //dd($request->all());
        //接收get参数
        $type = $request->query('type');
        $id = $request->query('id');
        //dd($id);
        //组合类名
        $class = 'App\Models\\'.ucfirst($type);
        //找到对应的文章/评论
        $model = $class::find($id);
        //dd($model);
        $collect = $model->collect->where('user_id',auth()->id())->first();
        //dd($collect);
        //dd($model->collect());
        if($collect = $model->collect->where('user_id',auth()->id())->first()){
            $collect->delete();
        }else{
            $model->collect()->create(['user_id'=>auth()->id()]);
        }
        return back();

    }
}
