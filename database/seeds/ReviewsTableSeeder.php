<?php

use Illuminate\Database\Seeder;
use App\Review;
use App\User;
use App\Product;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Review::count()) {
            $faker = \Faker\Factory::create();
            $user_ids = User::all()->pluck('id')->toArray();
            $product_ids = Product::all()->pluck('id')->toArray();

            for ($i = 0; $i < 40; $i++) {
                Review::create([
                    'review' => $faker->text($maxNbChars = 30),
                    'rating' => $faker->numberBetween($min = 0, $max = 5),
                    'user_id' => $faker->randomElement($user_ids),
                    'product_id' => $faker->randomElement($product_ids)
                ]);
            }
        }
    }
}
