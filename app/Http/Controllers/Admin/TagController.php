<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\StoreTagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    private $tag;

    /**
     * TagController constructor.
     * @param $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tag->all();
        return view('admin.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $input = $request->all();
        $this->tag->create($input);
        flash(config('admin.tag.tag.created'),'success');
        return redirect()->route('admin.tag.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tag->findOrFail($id);
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = $this->tag->findOrFail($id);
        $result = $tag->update($request->all());
        if($result){
            flash(config('admin.tag.tag.update_success'),'success');
            return redirect()->route('admin.tag.show');
        }
        flash(config('admin.tag.tag.update_fail'),'error');
        return redirect()->route('admin.tag.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
