<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //调用模型工厂一次性填充10个数据
        factory(\App\User::class,10)->create();
        //修改第一个数据为正式数据
        $user = \App\User::find(1);
        $user->name = 'xySakura';
        $user->email = 'mryrc33@163.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->save();
    }
}
