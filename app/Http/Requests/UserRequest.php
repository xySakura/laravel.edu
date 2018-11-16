<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'email'    => 'email|unique:users',
            'password' => 'required|min:6|confirmed',
            'code'     => [
                'required',
                //使用表单验证--自定义验证规则--使用闭包
                //$value 表单提交过来的code对应的值
                function ($attribute, $value, $fail) {
                    if ($value != session('code')) {
                        $fail('验证码不正确');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => '用户名不能为空',
            'email.email'        => '请输入正确的邮箱',
            'email.unique'       => '该邮箱已注册',
            'password.required'  => '密码不能为空',
            'password.min'       => '密码长度不能小于6位',
            'password.confirmed' => '二次密码输入不一致',
            'code.required'      => '验证码不能为空',
        ];
    }

}
