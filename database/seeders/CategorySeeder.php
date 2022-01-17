<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            'name'=>'Photograph'
        ]);

        \DB::table('categories')->insert([
            'name'=>'Lifestyle'
        ]);

        \DB::table('categories')->insert([
            'name'=>'Graphics & Design'
        ]);

        \DB::table('categories')->insert([
            'name'=>'Video & Animation'
        ]);
    }
}
