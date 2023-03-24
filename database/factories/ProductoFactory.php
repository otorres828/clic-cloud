<?php
use App\Models\User;
use Faker\Generator as Faker;
use App\Models\Producto;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name(),
        'codigo'=>$faker->numberBetween(1000, 100000),
        'user_id'=>User::all()->random()->id,
    ];
});
