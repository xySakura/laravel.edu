<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class XyModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xy_module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //扫描app/Http/Controllers/所有文件
        $modules = glob('app/Http/Controllers/*');

        //dump($modules);

        foreach ($modules as $module)
        {
            //dump($module);
            //判断目录中是否有/System
            if(is_dir($module.'/System')){
                //dump($module);

                //获取英文标识
                $moduleName = basename($module);
                //dump($moduleName);

                //获取中文标识
                $config = include $module.'/System/config.php';
                //dump($config);

                //获取权限
                $permissions = include $module . '/System/permission.php';
                //dump($permissions);

                //将数据写入modules表
                Module::firstOrNew(['name'=>$moduleName])->fill([
                    'title'=>$config['app'],
                    'permissions'=>$permissions
                ])->save();

                //将权限写入permissions表
                foreach ($permissions as $permission){
                    Permission::firstOrNew(['name'=>$moduleName.'-'.$permission['name']])->fill([
                        'title'=>$permission['title'],
                        'module'=>$moduleName
                    ])->save();
                }


            }

        }

        //***********************************************************************************************************************
        //自建填充，设置初始站长
        $role = Role::where('name','headmaster')->first();
        //dump($role);

        //获取所有权限
        $permissions = Permission::pluck('name');
        //dump($permissions);

        //给角色同步权限
        $role->syncPermissions($permissions);
        //dump($role);

        //获得站长用户
        $user = User::find(1);
        //dump($user);

        //给用户设置站长角色
        $user->assignRole('headmaster');
        //dump($user);


        //清除权限缓存
        app()['cache']->forget('spatie.permission.cache');
        //命令执行成功提示信息
        $this->info('permission init successfully');

    }
}
