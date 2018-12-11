<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Keyword;
use App\Models\ResponseDefault;
use App\Services\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function handler(WechatService $wechatService){

        //实例消息管理模块
        $instance = WeChat::instance('message');
        //dd($instance);

        //***********************************自动回复************************************
        if ($instance->isTextMsg())
        {
            $content = $instance->Content;
            //向用户回复消息
            return $this->keywordToResponse($instance,$content);
        }

        //***********************************点击菜单************************************
        $buttonInstance = WeChat::instance('button');

        if ($buttonInstance->isClickEvent()) {
            //获取消息内容
            $message = $buttonInstance->getMessage();
            return $this->keywordToResponse($instance,$message->EventKey);
        }

        //***********************************关注回复************************************
        if ($instance->isSubscribeEvent())
        {
            $content = ResponseDefault::find(1);
            //dd($content);
            //向用户回复消息
            return $instance->text($content['data']['subscribe']);
        }




    }



    //封装方法 通过关键词找回复内容
    private function keywordToResponse($instance,$content){
        if($keyword = Keyword::where('key',$content)->first()){
            //通过关键词模型关联 rule
            $rule = $keyword->rule;


            if($rule['type'] =='text'){
                //文本消息
                //获取所有对应的文本回复
                $responseContent = json_decode($rule->responseText->pluck('content')->toArray()[0],true);
                //从所有回复内容中每次随机一个
                $content = array_random($responseContent)['content'];
                //回复粉丝
                return $instance->text($content);
            }elseif ($rule['type'] =='news'){
                //图文消息
                $news = json_decode($rule->responseNews->toArray()[0]['data'],true);
                return $instance->news([$news]);
            }
        }

        //默认回复
        $content = ResponseDefault::find(1);
        //dd($content);
        //向用户回复消息
        return $instance->text($content['data']['default']);
    }
}
