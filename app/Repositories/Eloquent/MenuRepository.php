<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/14 0014
 * Time: 下午 3:51
 */

namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\Repository;
use App\Models\Menu;
use Illuminate\Support\Facades\Cache;
class MenuRepository extends Repository
{

    public function model()
    {
        return Menu::class;
    }

    public function sortMenu($menus,$pid=0)
    {
        $arr = [];
        if (empty($menus)) {
            return '';
        }
        foreach ($menus as $key => $v) {
            if ($v['parent_id'] == $pid) {
                $arr[$key] = $v;
                $arr[$key]['child'] = self::sortMenu($menus,$v['id']);
            }
        }
        return $arr;
    }
    /**
     * 排序子菜单并缓存
     * @date   2016-08-09
     * @param  string     $value [description]
     * @return [type]            [description]
     */
    public function sortMenuSetCache()
    {
        $menus = $this->model->orderBy('sort','desc')->get()->toArray();
        if ($menus) {
            $menuList = $this->sortMenu($menus);
            foreach ($menuList as $key => &$v) {
                if ($v['child']) {
                    $sort = array_column($v['child'], 'sort');
                    array_multisort($sort,SORT_DESC,$v['child']);
                }
            }
            // 缓存菜单数据
            Cache::forever(config('admin.globals.cache.menuList'),$menuList);
            return $menuList;

        }
        return '';
    }
    /**
     * [getMenuList description]
     * @date   2016-08-10
     * @return [type]     [description]
     */
    public function getMenuList()
    {
        // 判断数据是否缓存
        if (Cache::has(config('admin.globals.cache.menuList'))) {
            return Cache::get(config('admin.globals.cache.menuList'));
        }
        return $this->sortMenuSetCache();
    }

}