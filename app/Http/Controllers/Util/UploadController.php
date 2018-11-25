<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function uploader(Request $request){
        //dd($_FILES);
        //$path = $request->file('avatar')->store('avatars');
        //$path = $request->file('上传表单name名')->store('上传文件存储目录','指定磁盘(对应config/filesystem.php中disk)');
        $file = $request->file('file');
        //dd($file);

        //$path = $request->file('file')->store('avatars');

        //return $path;
        $this->checkSize($file);
        $this->checkType($file);


        if($file){
            $path = $file->store('attachment','attachment');
            //dd($path);
            //关联添加
            auth()->user()->attachment()->create([
                'name'=>$file->getClientOriginalName(),
                'path'=>url($path)
            ]);
        }
        //
        return ['file' =>url($path), 'code' => 0];
    }

    public function filesLists(){
        $files = auth()->user()->attachment()->paginate(20);
        //dd($files);
        $data = [];
        foreach($files as $file){
            $data[] = [
                'url'=>$file['path'],
                'path'=>$file['path']
            ];
        }
        //dd($data);
        return [
            'data'=>$data,
            'page'=>$files->links() . '',
            'code'=> 0
        ];

    }

    public function checkSize($file){
        if ($file->getSize() > 2000000){

            throw new UploadException('上传文件过大');
        }
    }

    public function checkType($file){
        if(!in_array(strtolower($file->getClientOriginalExtension()),['jpg','png'])){

            throw new UploadException('类型不允许');
        }
    }
}
