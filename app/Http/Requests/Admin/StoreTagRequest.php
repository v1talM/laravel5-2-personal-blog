<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class StoreTagRequest extends Request
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
            'name' => 'required|unique:tags,name',
            'slug' => 'required|unique:tags,slug',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => config('admin.tag.tag.name_require'),
            'name.unique'  => config('admin.tag.tag.name_unique'),
            'slug.required' => config('admin.tag.tag.slug_require'),
            'slug.unique' => config('admin.tag.tag.slug_unique')
        ];
    }
}
