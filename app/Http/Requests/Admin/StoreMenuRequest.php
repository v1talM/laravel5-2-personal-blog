<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class StoreMenuRequest extends Request
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
        'name' => 'required|unique:menus,name',
        'url' => 'required',
        'parent_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '菜单名不能为空',
            'name.unique' => '菜单名已经存在',
            'url.required' => '菜单链接不能为空',
            'parent_id.required' => '菜单层级不能为空'
        ];

    }
}
