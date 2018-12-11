<?php

namespace App\Http\Controllers\Api;


use App\Models\Swiper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SwiperController extends CommonController
{
    public function swipers(){
        $limit = \request()->query('limit',5);


        return $this->response->array(Swiper::limit($limit)->get());
    }
}
