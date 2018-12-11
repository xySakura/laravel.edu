<?php
namespace App\Services;

use App\Models\Keyword;
use App\Models\Rule;
use Houdunwang\WeChat\WeChat;

class WechatService{
    public function __construct(){
        //与微信通信绑定
        $config = config('hd_wechat');
        //dd($config);
        WeChat::config($config);
        WeChat::valid();
    }

    public function ruleView($rule_id =0){
        $rule = Rule::find($rule_id);
        //dd($rule);
        //dd($rule->keyword()->select('key')->get()->toArray());

        $data = [
            'name'=>$rule?$rule['name']:'',
            'keywords'=>$rule?$rule->keyword()->select('key')->get()->toArray():[],
        ];
        //dd($data);

        return view('wechat.layouts.rule',compact('data'));
    }

    public function ruleStore($type,$rule_id= 0){

        //request函数
        $post = request()->all();
        //数据格式转换
        $data = json_decode($post['rule'],true);

        //dd($data);
        //添加验证规则
        \Validator::make($data,[
            'name'=>'required',
            'keywords'=>'required'
        ],[
            'name.required'=>'规则不能为空',
            'keywords.required'=>'至少有一个关键词',
        ])->validate();

        if($rule_id == 0){
            //写入规则表
            $ruleModel = Rule::create([
                'name'=>$data['name'],
                'type'=>$type
            ]);
        }else{
            $rule = Rule::find($rule_id);
            $rule->update(['name'=>$data['name']]);
            //全部删除
            $rule->keyword()->delete();
        }


        //dd($ruleModel);
        //dd($rule['keywords']);
        //写入关键词表
        foreach ($data['keywords'] as $v){
            Keyword::create([
               'rule_id'=>$rule_id?$rule_id:$ruleModel['id'],
               'key'=>$v['key']
            ]);
        }

        if ($rule_id == 0){
            return $ruleModel;
        }
    }

    public function ruleUpdate($rule_id){

        $rule = Rule::find($rule_id);
        $post = request()->all();
        $data = json_decode($post['rule'],true);
        $rule->update(['name'=>$data['name']]);

        //全部删除
        $rule->keyword()->delete();

        //写入新数据
        foreach ($data['keywords'] as $v){
            Keyword::create([
                'rule_id'=>$rule_id,
                'key'=>$v['key']
            ]);
        }


    }


}