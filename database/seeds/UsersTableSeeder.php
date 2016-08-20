<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();

        $admin = factory(User::class)->create([
            'name' => 'vital',
            'email' => '373357042@qq.com',
            'password' => bcrypt('123456')
        ])->each(function ($u) use ($adminRole){
           $u->attachRole($adminRole);
        });

        $user = factory(User::class,3)->create([
            'password' => bcrypt('123456')
        ])->each(function ($u) use ($userRole){
            $u->roles()->attach($userRole->id);
        });
    }
}
