<?php

use Faker\Generator as Faker;

$factory->define(App\Link::class, function (Faker $faker) {
    return [
        'url'       =>  $faker->url(),
        'code'      =>  $faker->bothify('###??'),
        'shorten'   =>  url($faker->bothify('###??')),
        'hits'      =>  $faker->numberBetween($min = 1, $max = 100)
    ];
});
