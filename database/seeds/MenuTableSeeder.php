<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'Home',
            'icon' => 'fa fa-home',
            'parent_id' => '0',
            'url' => '/',
        ]);
        Menu::create([
            'name' => '菜单管理',
            'icon' => 'fa fa-cogs',
            'parent_id' => '0',
            'url' => '/admin/menu',
        ]);
        Menu::create([
            'name' => '分类管理',
            'icon' => 'fa fa-folder-open-o',
            'parent_id' => '0',
            'url' => '/admin/category',
        ]);
        Menu::create([
            'name' => '标签管理',
            'icon' => 'fa fa-tags',
            'parent_id' => '0',
            'url' => '/admin/tag',
        ]);

        $article = Menu::create([
            'name' => '文章管理',
            'icon' => 'fa fa-file-code-o',
            'parent_id' => '0',
            'url' => '/admin/article',
        ]);

        Menu::create([
            'name' => '文章列表',
            'parent_id' => $article->id,
            'url' => '/admin/article/list',
        ]);
        Menu::create([
            'name' => '创建文章',
            'parent_id' => $article->id,
            'url' => '/admin/article/create',
        ]);
        Menu::create([
            'name' => '文章回收站',
            'parent_id' => $article->id,
            'url' => '/admin/article/trash',
        ]);
    }
}
