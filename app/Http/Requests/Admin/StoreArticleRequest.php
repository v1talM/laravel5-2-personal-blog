<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class StoreArticleRequest extends Request
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
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '文章标题不能为空',
            'content.required' => '文章内容不能为空',
            'thumbnail.required' => '文章缩略图不能为空',
            'category_id.required' => '您还没有选择文章的分类',
            'tags.required' => '您还没有选择文章的标签'
        ];
    }
}
