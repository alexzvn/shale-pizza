<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Pizza',
            'Drink',
            'Salad',
            'Spagetti',
            'Combo',
            'Other'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
