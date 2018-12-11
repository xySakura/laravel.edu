<?php

namespace App\Http\Controllers\Swiper;

use App\Models\Swiper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SwiperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin',[
            'except'=>[],
        ]);
    }

    public function index()
    {

        xyHasRole('swiper');
        $swipers = Swiper::all();

        //dd($swipers);
        return view('swiper.index',compact('swipers'));
    }


    public function create()
    {
        xyHasRole('swiper');
        return view('swiper.create');
    }


    public function store(Request $request)
    {
        xyHasRole('swiper');
        Swiper::create($request->all());

        return redirect()->route('swiper.swiper.index')->with('success','操作成功');
    }




    public function edit(Swiper $swiper)
    {

        xyHasRole('swiper');
        return view('swiper.edit',compact('swiper'));
    }

    public function update(Request $request, Swiper $swiper)
    {
        xyHasRole('swiper');
        $swiper->update($request->all());


        return redirect()->route('swiper.swiper.index')->with('success','操作成功');
    }


    public function destroy(Swiper $swiper)
    {
        xyHasRole('swiper');
        $swiper->delete();
        return redirect()->route('swiper.swiper.index')->with('success','操作成功');

    }
}
