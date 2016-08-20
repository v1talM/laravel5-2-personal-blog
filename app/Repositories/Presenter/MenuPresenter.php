<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/14 0014
 * Time: 下午 5:46
 */

namespace App\Repositories\Presenter;

use App\Models\Menu;
use App\Repositories\Eloquent\MenuRepository;

class MenuPresenter
{
    private $menu;

    /**
     * MenuPresenter constructor.
     */
    public function __construct(MenuRepository $menu)
    {
        $this->menu=$menu;
    }

    public function getMenu($menus)
    {
        if ($menus) {
            $option = '<option value="0">顶级菜单</option>';
            foreach ($menus as $v) {
                $option .= '<option value="'.$v->id.'">'.$v->name.'</option>';
            }
            return $option;
        }
        return '<option value="0">顶级菜单</option>';
    }

    public function getMenuList($menus)
    {
        if ($menus) {
            $item = '';
            foreach ($menus as $v) {
                $item.= $this->getNestableItem($v);
            }
            return $item;
        }
        return '暂无菜单';
    }
    protected function getNestableItem($menu)
    {
        if ($menu['child']) {
            return $this->getHandleList($menu['id'],$menu['name'],$menu['child']);
        }
        if ($menu['parent_id'] == 0) {
            return '<li class="dd-item dd3-item" data-id="'.$menu['id'].'"><div class="dd-handle dd3-handle"> </div><div class="dd3-content"> '.$menu['name'].$this->getActionButtons($menu['id']).' </div></li>';
        }
        return '<li class="dd-item dd3-item" data-id="'.$menu['id'].'"><div class="dd-handle dd3-handle"> </div><div class="dd3-content"> '.$menu['name'].$this->getActionButtons($menu['id'],false).' </div></li>';
    }
    /**
     * 判断是否有子集
     * @param  [type]     $id    [description]
     * @param  [type]     $name  [description]
     * @param  [type]     $child [description]
     * @return [type]            [description]
     */
    protected function getHandleList($id,$name,$child)
    {
        $handle = '<li class="dd-item dd3-item" data-id="'.$id.'"><div class="dd-handle dd3-handle"> </div><div class="dd3-content"> '.$name.$this->getActionButtons($id).' </div><ol class="dd-list">';
        if ($child) {
            foreach ($child as $v) {
                $handle .= $this->getNestableItem($v);
            }
        }
        $handle .= '</ol></li>';
        return $handle;
    }
    /**
     * 菜单按钮

     * @return [type]     [description]
     */
    protected function getActionButtons($id,$bool = true)
    {
        $action = '<div class="pull-right action-buttons">';
        if (auth()->user()->can(config('admin.permissions.menus.add')) && $bool) {
            $action .= '<a href="javascript:;" data-pid="'.$id.'" class="btn-xs createMenu" data-toggle="tooltip"data-original-title="添加"  data-placement="top"><i class="fa fa-plus"></i></a>';
        }
        if (auth()->user()->can(config('admin.permissions.menus.edit'))) {
            $action .= '<a href="javascript:;" data-href="'.url('admin/menu/'.$id.'/edit').'" class="btn-xs editMenu" data-toggle="tooltip"data-original-title="修改"  data-placement="top"><i class="fa fa-pencil"></i></a>';
        }
        if (auth()->user()->can(config('admin.permissions.menus.delete'))) {
            $action .= '<a href="javascript:;" class="btn-xs destoryMenu" data-original-title="删除"data-toggle="tooltip"  data-placement="top"><i class="fa fa-trash"></i><form action="#" method="POST" name="delete_item" style="display:none"><input type="hidden"name="_method" value="delete"><input type="hidden" name="_token" value="'.csrf_token().'"></form></a>';
        }
        $action .= '</div>';
        return $action;
    }

    public function getSidebar()
    {
        $menus = $this->menu->getMenuList();
        if($menus){
            $item = '';
            foreach ($menus as $menu) {
                $item.= $this->getSidebarMenuList($menu);
            }
            return $item;
        }
        return '';
    }

    protected function getSidebarMenuList($menu)
    {
        if($menu['child']) {
            return $this->getHandleSidebarList($menu);
        }
        if($menu['parent_id'] == 0) {
            return '<li><a href="'. $menu['url'] .'"><i class="'.$menu['icon'].'"></i> '. $menu['name'] .' </a>';
        }
        return '<li><a href="'.$menu['url'].'">'.$menu['name'].'</a></li>';
    }

    protected function getHandleSidebarList($menu)
    {
        $handle = '<li><a><i class="'.$menu['icon'].'"></i> '. $menu['name'] .' <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
        if ($menu['child']) {
            foreach ($menu['child'] as $v) {
                $handle .= $this->getSidebarMenuList($v);
            }
        }
        $handle.= '</ul></li>';
        return $handle;
    }
}