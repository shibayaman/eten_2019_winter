<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Owner;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    $randomInt = random_int(0, 2);
    return [
        'password' => Str::random(16),
        'project_code' => ['W', 'I', 'G'][$randomInt] . $faker->unique()->regexify('[0-9]{3}'),
        'season_id' => 1,
        'class_id' => ['WD1A', 'IE1A', 'CD2A'][$randomInt],
        'expires_at' => new DateTime(Config::get('const.eventDate'))
    ];
});
