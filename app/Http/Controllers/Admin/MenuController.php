<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Repositories\Eloquent\MenuRepository;
use App\Http\Requests\Admin\StoreMenuRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menu;

    /**
     * MenuController constructor.
     * @param $menu
     */
    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }


    public function index()
    {
       $menu = $this->menu->findByField('parent_id',0);
       $menuList = $this->menu->getMenuList();
        return view('admin.menu.list',compact('menuList','menu'));
    }

    public function store(StoreMenuRequest $request)
    {
        $result = $this->menu->create($request->all());
        if($result){
            flash('添加菜单成功','success');
        }else{
            flash('添加菜单失败','error');
        }
        return redirect('admin/menu');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $menu['update'] = route('admin.menu.update',['id' => $menu->id]);
        return $menu;
    }

    public function update(Request $request,$id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect('admin/menu');
    }
}
