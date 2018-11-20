<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(['怪物猎人','荒野大镖客2','战神','精灵宝可梦','八方旅人'] as $v){
            DB::table('categories')
                ->insert([
                    'title' => $v,
                    'icon' => 'fa fa-bar-chart-o',
                ]);
        }
    }
}
