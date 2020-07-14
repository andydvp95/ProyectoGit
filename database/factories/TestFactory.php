<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Test;
use Faker\Generator as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;


$factory->define(Test::class, function (Faker $faker) {

    return [
        'nombre' => $faker->name,
        'correo' => $faker->unique()->safeEmail,
        'token' => Str::random(10),
        'descripcion' => $faker->text,
        'telefono' => $faker->phoneNumber,
        'direccion' => $faker->address,
        'numero' => $faker->randomDigit,
        'fecha' => Carbon::now()->format('Y-m-d'),
        'hora' => Carbon::now()->format('H:i:s'),
        'username' => $faker->userName,
        'hex' => $faker->hexcolor,
        'imagen' => $faker->imageUrl(300, 300, 'cats', true, 'Faker'),
        'aleatorio' => $faker->numberBetween(1, 500),
    ];


});
