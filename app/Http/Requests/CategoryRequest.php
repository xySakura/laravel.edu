<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route('category') ? $this->route('category')->id : null;
        return [
            'title'=>'required|unique:categories,title,' . $id,
            'stitle'=>'required',
            'icon'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'标题不能为空',
            'title.unique'=>'标题已存在',
            'stitle.required'=>'小标题不能为空',
            'icon.required'=>'请选择文章图标'
        ];
    }
}
