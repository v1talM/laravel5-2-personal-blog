<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $category;

    /**
     * CategoryController constructor.
     * @param $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return view('admin.category.index',compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $input = $request->all();
        $this->category->create($input);
        flash(config('admin.category.category.created'),'success');
        return redirect()->route('admin.category.show');
    }

    public function edit($id)
    {
        $category = $this->category->withTrashed()->findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->findOrFail($id);
        $result = $category->update($request->all());
        if($result){
            flash(config('admin.category.category.update_success'),'success');
            return redirect()->route('admin.category.show');
        }
        flash(config('admin.category.category.update_fail'),'error');
        return redirect()->route('admin.category.show');
    }

    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();
        flash(config('admin.category.category.delete'),'success');
        return redirect()->route('admin.category.show');
    }

    public function trash()
    {
        $categories = $this->category->onlyTrashed()->get();
        return view('admin.category.trash',compact('categories'));
    }

    public function delete($id)
    {
        $category = $this->category->onlyTrashed()->findOrFail($id);
        $result = $category->forceDelete();
        if($result){
            flash(config('admin.category.category.force_delete_success'),'success');
            return redirect()->back();
        }
        flash(config('admin.category.category.force_delete_fail'),'error');
        return redirect()->back();
    }

    public function restore($id)
    {
        $category = $this->category->onlyTrashed()->findOrFail($id);
        $result = $category->restore();
        if($result){
            flash(config('admin.category.category.restore_success'),'success');
            return redirect()->back();
        }
        flash(config('admin.category.category.restore_fail'),'success');
        return redirect()->back();
    }
}
