<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //渲染首页
    public function index(){
        //dd(session()->get('success'));
        return view('home.index');
    }
}
