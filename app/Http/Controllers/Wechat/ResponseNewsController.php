<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseNews;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class ResponseNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin',[
            'except'=>[]
        ]);
    }

    public function index()
    {
        xyHasRole('wechat');
        $data = ResponseNews::paginate(10);

        return view('wechat.response_news.index',compact('data'));
    }


    public function create(WechatService $wechatService)
    {
        xyHasRole('wechat');

        $ruleView = $wechatService->ruleView();
        return view('wechat.response_news.create',compact('ruleView'));
    }


    public function store(Request $request,WechatService $wechatService)
    {
        xyHasRole('wechat');
        //dd($request->all());
        //dd($responseText['rule_id']);
        //开启事务
        DB::beginTransaction();
        //调用服务方法
        $rule  = $wechatService->ruleStore('news');
        //dd($request->all());
        ResponseNews::create([
            'data'=>$request['data'],
            'rule_id'=>$rule['id'],
        ]);
        DB::commit();
        //dd($rule);

        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }





    public function edit(ResponseNews $responseNews,WechatService $wechatService)
    {
        xyHasRole('wechat');
        $ruleView = $wechatService->ruleView($responseNews['rule_id']);
        return view('wechat.response_news.edit',compact('ruleView','responseNews'));
    }


    public function update(Request $request, ResponseNews $responseNews,WechatService $wechatService)
    {
        xyHasRole('wechat');
        //开启事务
        DB::beginTransaction();
        //        dd($responseText);
        //更新规则表和关键词表
        $wechatService->ruleStore($responseNews['rule_id']);
        //更新回复表
        $responseNews->update([
            'data'=>$request['data'],
            'rule_id'=>$responseNews['rule_id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }


    public function destroy(ResponseNews $responseNews)
    {
        xyHasRole('wechat');
        $responseNews->rule()->delete();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }
}
