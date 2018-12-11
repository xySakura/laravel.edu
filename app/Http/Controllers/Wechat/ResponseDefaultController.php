<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseDefault;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResponseDefaultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin',[
            'except'=>[]
        ]);
    }


    public function create()
    {
        xyHasRole('wechat');
        $data = ResponseDefault ::find(1);

        return view('wechat.response_default.create', compact('data'));
    }


    public function store(Request $request)
    {
        xyHasRole('wechat');
        $responseDefault = ResponseDefault ::firstOrNew(['id' => 1]);

        $responseDefault['data'] = $request -> all();

        $responseDefault -> save();

        return back() -> with('success', '操作成功');

    }


}
