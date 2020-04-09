<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\Service::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'category_id' => function(){
            return factory(\App\Models\Category::class)->create()->id;
        },
        'filepath' => $faker->unique()->fileExtension,
    ];
});
