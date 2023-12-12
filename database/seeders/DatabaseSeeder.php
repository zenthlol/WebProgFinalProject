<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Publisher::factory(5)->create();
        $this->call([
            PublisherSeeder::class,
        ]);
        // \App\Models\Category::factory(5)->create();
        \App\Models\Book::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            BookSeeder::class,
            CategorySeeder::class
        ]);

        \App\Models\BookCategory::factory(5)->create();
    }
}

