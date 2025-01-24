<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alioune Diallo',
            'email' => 'ali@tester.com',
            'password' => bcrypt('passer123'),
        ]);

        Category::factory(5)->create();

        Article::factory(10)->create([
            'category_id' => fn() => Category::inRandomOrder()->first()->id,
        ]);
    }
}
