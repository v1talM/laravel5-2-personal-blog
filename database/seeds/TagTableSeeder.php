<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'laravel',
            'slug' => 'laravel',
            'description' => '与laravel有关的'
        ]);

        Tag::create([
            'name' => 'thinkPHP',
            'slug' => 'thinkPHP',
            'description' => '与thinkPHP有关的'
        ]);
    }
}
