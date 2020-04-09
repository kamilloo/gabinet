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

$factory->define(\App\Models\PricingItem::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'link' => $faker->url,
        'price' => $faker->randomFloat(2,1,99),
        'pricing_id' => factory(\App\Models\Pricing::class)->create()->id,
    ];
});
