<?php
if(!function_exists('xy_config')){
    function xy_config($var){
        static $cache=[];
        $info = explode('.',$var);
        if(!$cache){
            //如果没有缓存，则从数据库读取数据
            $cache = Cache::get('config_cache',function(){
                return \App\Models\Config::pluck('data','name');
            });
        }

        return $cache[$info[0]][$info[1]]??'';
    }

    //检测当前用户是否有制定角色
    function xyHasRole($role)
    {

        if (!auth()->user()->hasRole($role)) {

            throw  new \App\Exceptions\AuthException('Buzai,Guna');

        }
    }
}