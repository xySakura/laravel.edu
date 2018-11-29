<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    //渲染首页
    public function index(){

        $actives = Activity::latest()->limit(4)->get();

        //dd($actives->count());
        //dd(session()->get('success'));
        return view('home.index',compact('actives'));
    }

    public function search(Request $request){
        $wd = $request->query('wd');

        $type = $request->query('type');

        //dd($request->query('type'));





        if ($type == 'article'){
            $articles = Article::search($wd)->paginate(10);
            return view('home.search',compact('articles','type'));
        }elseif($type == 'user'){
            $users = User::search($wd)->paginate(10);
            return view('home.search',compact('users','type'));
        }

    }
}
