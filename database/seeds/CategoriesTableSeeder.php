<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Category::count()) {
            Category::create([
                'name' => 'category 1',
                'description' => 'description for category 1'
            ]);

            Category::create([
                'name' => 'category 2',
                'description' => 'description for category 2'
            ]);

            Category::create([
                'name' => 'category 3',
                'description' => 'description for category 3'
            ]);
        }
    }
}
