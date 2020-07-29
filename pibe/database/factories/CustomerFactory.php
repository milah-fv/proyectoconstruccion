<?php

use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Fábrica de Datos de Prueba de Clientes
|--------------------------------------------------------------------------
|
| Este directorio contine la generación de datos de prueba para el Test de la clase Customer (Clientes)
|
*/

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
