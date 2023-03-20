<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Videogame;
use Faker\Generator as Faker;

class VideogamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 15; $i++) {
            $new_game = new Videogame();
            $new_game->title = $faker->name();
            $new_game->price = $faker->randomNumber(2, true);
            $new_game->available = $faker->boolean();
            $new_game->image = $faker->$faker->imageUrl(400, 400, 'animals', true);
            $new_game = new Videogame();

        }
    }
}