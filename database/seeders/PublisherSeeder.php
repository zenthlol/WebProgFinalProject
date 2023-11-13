<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('publishers')->insert([
            [
                'name' => 'Kenneth',
                'address' => 'TVM',
                'phone' => '085959536962',
                'email' => 'kenneth.tjiang@gmail.com',
                'image' => 'testimg1'
            ],
            [
                'name' => 'Jordan',
                'address' => 'TVM2',
                'phone' => '08123231',
                'email' => 'jordan.tjiang@gmail.com',
                'image' => 'testimg2'
            ]
            ]);
    }
}
