<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'admin';
        $role->display_name = '超级管理员';
        $role->description = '超级管理员';
        $role->save();

        $owner = new Role;
        $owner->name = 'user';
        $owner->display_name = '管理员';
        $owner->description = '普通管理员';
        $owner->save();

        $allPermission = array_column(Permission::all()->toArray(),'id');
        $role->perms()->sync($allPermission);

        $creatUser = Permission::where('display_name','创建用户')->first();
        $owner->attachPermission($creatUser);

    }
}
