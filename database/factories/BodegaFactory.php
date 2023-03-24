<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bodega;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Bodega::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->sentence(),
        'user_id'=>User::all()->random()->id,
    ];
});
