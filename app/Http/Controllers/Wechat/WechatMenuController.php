<?php

namespace App\Http\Controllers\Wechat;

use App\Models\WechatMenu;
use App\Services\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WechatMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin',[
            'except'=>[],
        ]);
    }

    public function index()
    {
        xyHasRole('wechat');
        $menus = WechatMenu::latest()->paginate(10);

        return view('wechat.menu.index',compact('menus'));
    }


    public function create()
    {
        xyHasRole('wechat');

        return view('wechat.menu.create');
    }


    public function store(Request $request)
    {
        xyHasRole('wechat');
        //dd($request->all());
        WechatMenu::create($request->all());

        return redirect()->route('wechat.menu.index')->with('success','操作成功');
    }




    public function edit(WechatMenu $menu)
    {
        xyHasRole('wechat');
        return view('wechat.menu.edit',compact('menu'));
    }


    public function update(Request $request, WechatMenu $menu)
    {
        xyHasRole('wechat');
        $menu->update($request->all());

        return redirect()->route('wechat.menu.index')->with('success','操作成功');

    }


    public function destroy(WechatMenu $menu)
    {
        xyHasRole('wechat');
        $menu->delete();
        return redirect()->route('wechat.menu.index')->with('success','删除成功');
    }

    public function push(WechatMenu $menu,WechatService $wechatService){
        xyHasRole('wechat');
        $data = json_decode($menu['data'],true);
        //dd($data);

        $res = WeChat::instance('button')->create($data);
        //dd($res);

        if($res['errcode'] == 0){
            $menu->update(['status'=>1]);
            WechatMenu::where('id','!=',$menu->id)->update(['status'=>0]);
            return back()->with('success','菜单推送成功');
        }else{
            return back()->with('danger',$res['errmsg']);
        }

    }



}
