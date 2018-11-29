<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
           'only'=>['make']
        ]);
    }


    public function make(Request $request){
        //dd($request->all());
        //接收get参数
        $type = $request->query('type');
        $id = $request->query('id');
        //组合类名
        $class = 'App\Models\\'.ucfirst($type);
        //找到对应的文章/评论
        $model = $class::find($id);
        //dd($id);
        //dd($model);
        //$like = $model->like;
        //dd($like);
        if($like = $model->like->where('user_id',auth()->id())->first()){
            $like->delete();
        }else{
            $model->like()->create(['user_id'=>auth()->id()]);
        }

        if($request->ajax()){
            //这个需要重新获取对应模型,这句话结合异步请求
            $newModel = $class::find($id);
            return ['code'=>1,'message'=>'','num'=>$newModel->like->count()];
        }

        return back();
    }
}
