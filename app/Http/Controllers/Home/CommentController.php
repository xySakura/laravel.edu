<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index(Request $request,Comment $comment)
    {
        $comments = $comment->with('user')->where('article_id',$request->article_id)->get();
        return ['code'=>1,'message'=>'','comments'=>$comments];
    }


    public function store(Request $request,Comment $comment)
    {
        $comment->user_id = auth()->id();
        $comment->article_id = $request->article_id;
        $comment->content = $request['content'];
        $comment->save();

        $comment = $comment->with('user')->find($comment->id);
        //dd($comment->toArray());

        return ['code'=>1,'message'=>'','comment'=>$comment];
    }





}
