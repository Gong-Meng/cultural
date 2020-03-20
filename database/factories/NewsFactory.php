<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
	$date_time = $faker->date . ' ' . $faker->time;
    return [
        "title" => $faker->sentence(),
        "content" => $faker->text(),
        "created_at" => $date_time,
        "updated_at" => $date_time,
    ];
});
