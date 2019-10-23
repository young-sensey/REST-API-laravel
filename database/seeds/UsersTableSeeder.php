<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            $faker = \Faker\Factory::create();

            $password = Hash::make('toptal');

            for ($i = 0; $i < 10; $i++) {
                User::insert([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => $password,
                ]);
            }
        }
    }
}
