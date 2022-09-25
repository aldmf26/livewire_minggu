<?php

namespace Database\Seeders;

use App\Models\Articles;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        foreach (range(1, 20) as $i) {
            Articles::create([
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'body' => $faker->sentence($nbWords = 10, $variableNbWords = true),
            ]);
        }
    }
}
