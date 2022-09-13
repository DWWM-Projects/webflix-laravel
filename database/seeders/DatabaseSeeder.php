<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Movie;
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
        $category = Category::factory()->create(['name' => 'Comédie']);
        Category::factory()->create(['name' => 'Action']);
        $categories = Category::factory(8)->create();

        // Movie::factory(20)->for($categories->random())->create();
        // Movie::factory(20)->for($category)->create();
        Movie::factory(20)->create(function () use ($categories) {
            return ['category_id' => $categories->random()];
        });

        for ($i = 0; $i < 20; $i++) {
            Movie::factory()->create(['category_id' => $categories->random()]);
        }
    }
}
