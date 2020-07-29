<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Fábrica de Datos de Prueba de Productos
|--------------------------------------------------------------------------
|
| Este directorio contine la generación de datos de prueba para el Test de la clase Producto
|
*/

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomElement(['100.0', '150.0', '30.0', '40.0', '55.0', '65.0', '70.0', '80.0', '95.0']),
        'stock' => $faker->biasedNumberBetween('1','9'),
        'cover_image' => $faker->randomElement(['img_product/aUHX9nl8l9zwezIhx5hyuBki7mhMn1P5D3iMAihE.jpeg']),
        'description' => $faker->text,
        'features' => $faker->text,
        'state' => $faker->randomElement(['Oferta', 'Nuevo', 'Simple']),
        'category_id' => $faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9']),
        'color_id' => $faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']),
    ];
});
