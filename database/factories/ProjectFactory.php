<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'product_name' => $faker->word,
        'catchphrase' => $faker->text(40),
        'description' => $faker->text(200),
        'image_path' => 'testimg',
        'production_time' => $faker->randomNumber(2) . '時間',
        'leader_name' => $faker->name,
        'team_name' => $faker->word,
        'team_member' => $faker->name,
        'genre' => $faker->word,
        'owner_id' => factory(App\Owner::class)->create()->id
    ];
});
