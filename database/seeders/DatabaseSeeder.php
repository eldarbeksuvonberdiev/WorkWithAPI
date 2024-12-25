<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeCharacteristic;
use App\Models\Category;
use App\Models\Characteristic;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i = 1; $i <= 20; $i++) {
            Category::create(['name' => 'Category' . $i]);
        }

        for ($i = 1; $i <= 20; $i++) {
            Characteristic::create([
                'name' => 'characteristic ' . $i
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            Attribute::create([
                'category_id' => rand(1, 20),
                'name' => 'attribute ' . $i
            ]);
        }

        for ($i=1; $i < 100; $i++) { 
            AttributeCharacteristic::create([
                'attribute_id' => rand(1,20),
                'characteristic_id' => rand(1,20),
            ]);
        }
    }
}
