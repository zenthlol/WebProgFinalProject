<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [
                'name' => 'Romance'
            ],
            [
                'name' => 'Fantasy'
            ],
            [
                'name' => 'Action'
            ],
            [
                'name' => 'Adventure'
            ],
            [
                'name' => 'Mystery'
            ],
            ]);
    }
}


