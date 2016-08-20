<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class StoreCategoryRequest extends Request
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
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => config('admin.category.category.name_require'),
            'name.unique'  => config('admin.category.category.name_unique'),
            'slug.required' => config('admin.category.category.slug_require'),
            'slug.unique' => config('admin.category.category.slug_unique')
        ];
    }
}
