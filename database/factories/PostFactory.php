<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'content'=>$faker->paragraphs(50,$variableNbWords=true),
        'user_id'=>$faker->randomElement(range(1,10))
    ];
});
