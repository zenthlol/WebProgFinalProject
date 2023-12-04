<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /*
     * Run the database seeds.
     *
     *
     */
    public function run()
    {
        \DB::table('books')->insert([
            [
                'title' => 'Fairy Tale',
                'author' => 'Zenitsu Agatsuma',
                'year' => '2003',
                'synopsis' => 'book about a fairy of tale that died',
                'image' => 'images/cover-images/harry-potter.jpeg',
                'publisher_id' => '1'
            ],
            [
                'title' => 'Oggy n Cockdrcok',
                'author' => 'Soggy dr',
                'year' => '2001',
                'synopsis' => 'Oggy',
                'image' => 'testimg2',
                'publisher_id' => '2',
            ]
            ]);
    }
}
