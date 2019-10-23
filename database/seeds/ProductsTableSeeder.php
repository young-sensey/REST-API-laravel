<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Product::count()) {
            $faker = \Faker\Factory::create();

            $category_ids = Category::all()->pluck('id')->toArray();

            for ($i = 0; $i < 40; $i++) {
                Product::create([
                    'name' => $faker->title,
                    'short_description' => $faker->text($maxNbChars = 30),
                    'description' => $faker->text($maxNbChars = 100),
                    'price' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
                    'category_id' => $faker->randomElement($category_ids),
                ]);
            }
        }
    }
}
