<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends CommonController
{
    //获取所有文章数据
    public function articles(){
        $limit = request()->query('limit',10);
        $cid = request()->query('cid');
        if($cid){
            $articles = Article::latest()->where('category_id',$cid)->paginate($limit);
        }else{
            $articles = Article::latest()->paginate($limit);
        }

        return $this->response->paginator($articles,new ArticleTransformer());

    }

    //获取制定一篇文章
    public function show($id){
        return $this->response->item(Article::find($id),new ArticleTransformer());
    }
}
