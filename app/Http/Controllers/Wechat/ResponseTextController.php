<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseText;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ResponseTextController extends Controller
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

        $data= ResponseText::paginate(10);
        //dd($text);
        return view('wechat.response_text.index',compact('data'));
    }


    public function create(WechatService $wechatService)
    {
        xyHasRole('wechat');
        $ruleView = $wechatService->ruleView();
        return view('wechat.response_text.create',compact('ruleView'));
    }


    public function store(Request $request,WechatService $wechatService,ResponseText $responseText)
    {
        xyHasRole('wechat');
        //dd($responseText['rule_id']);
        //开启事务
        DB::beginTransaction();
            //调用服务方法
        $rule  = $wechatService->ruleStore('text');

        //写入内容表
        //dd($request->all());
        //$responseText->create([
        //   'rule_id'=>$responseText['rule_id']?$responseText['rule_id']:$rule['id'],
        //   'content'=>$request['data']
        //]);
        $responseText->rule_id = $rule['id'];
        $responseText->content = $request['data'];
        $responseText->save();

        DB::commit();
        //dd($rule);

        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }



    public function edit(ResponseText $responseText,WechatService $wechatService)
    {
        xyHasRole('wechat');
        //dd($responseText);
        $ruleView = $wechatService->ruleView($responseText['rule_id']);

        return view('wechat.response_text.edit',compact('responseText','ruleView'));
    }


    public function update(Request $request, ResponseText $responseText,WechatService $wechatService)
    {
        xyHasRole('wechat');
        //dd($request->all());
        DB::beginTransaction();
         $wechatService->ruleStore($responseText['rule_id']);

         $responseText->update([
            'content'=>$request['data'],
            'rule_id'=>$responseText['rule_id']
         ]);


        DB::commit();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }


    public function destroy(ResponseText $responseText)
    {
        xyHasRole('wechat');
        $responseText->rule()->delete();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }
}
