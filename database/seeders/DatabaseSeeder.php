<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\SubProduct;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Product::factory(1)->create([
            'name' => 'Apple',
        ]);

        Category::factory(1)->create([
            'name' => 'Fruits',
        ]);

        SubProduct::factory(1)->create([
            'name' => 'Red Apple',
            // 'product_id' => '123e4567-e89b-12d3-a456-426614174000', // Example UUID
            // 'category_id' => '123e4567-e89b-12d3-a456-426614174000', // Example UUID
            'variant' => 'A',
        ]);
    }
}
