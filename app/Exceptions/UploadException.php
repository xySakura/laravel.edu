<?php

namespace App\Exceptions;

use Exception;

class UploadException extends Exception
{
    public function render(){
        //return response()->json(hdjs要求返回,http状态码);
        return response()->json(['message' =>$this->getMessage(), 'code' => 403],200);
    }
}
