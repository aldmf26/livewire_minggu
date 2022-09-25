<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @returclearn void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('users')->create([
            'name' => $faker->firstName,
            'email' => $faker->email,
            'password' => bcrypt('password'),
        ]);
    }
}
