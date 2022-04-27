<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = file_get_contents(base_path('foods.json'));

        $foods = collect(json_decode($foods, 1));

        $foods->each(function ($food) {
            $food = new Food($food);

            $food->forceFill(collect($food)->only([
                'name',
                'description',
                'price',
                'image',
                'category_id',
            ])->toArray())->save();
        });
    }
}
