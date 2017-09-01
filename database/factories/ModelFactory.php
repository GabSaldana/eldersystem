<?php

use Faker\Generator;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function(Generator $faker){

    $array = [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->email,
        //'password' => bcrypt(str_random(10)),
        'password' => bcrypt('123456'),
        'age' => $faker->numberBetween($min = 8, $max = 90),
        'sex' => $faker->randomElement($array = array ('F','M')),
        'height' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1.40, $max = 1.90),
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 40, $max = 100),
        'telephone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'short_description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'photo' => '/images/pacientes/001-pokeballs.png',
    ];
    return $array;
});

$factory->define(App\Admin::class, function(Generator $faker){

    $array = [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->email,
        //'password' => bcrypt(str_random(10)),
        'password' => bcrypt('123456'),
        'age' => $faker->numberBetween($min = 25, $max = 70),
        'sex' => $faker->randomElement($array = array ('F','M')),
        'specialty' => $faker->word,
        'schedule' => 'L,M,M,J,V 8-18',
        'professional_id' => $faker->regexify('[A-Z0-9._%+-]+[A-Z0-9.-]+.[A-Z]{8,8}'),
        'telephone_number' => $faker->phoneNumber,
        'office_address' => $faker->address,
        'photo' => '/images/pacientes/001-pokeballs.png',
    ];
    return $array;
});

$factory->define(App\Node::class, function(Generator $faker){

    $array = [
      'mac_address' => $faker->regexify('[A-Z0-9]+:[A-Z0-9]+:[A-Z0-9]+:[A-Z0-9]{2,2}'),
      'admin_id' => 1 ,
    ];
    return $array;
});

$factory->define(App\Inter::class, function(Generator $faker){

    $array = [
      //'name' => $faker->randomElement($array = array ('UART','UART')),
      'name' => $faker->randomElement($array = array ('GPIO','GPIO')),
      'quantity' => 2,
      'node_id' => 1,
    ];
    return $array;
});

$factory->define(App\Variable::class, function(Generator $faker){

    $array = [
      //'name' => 'Temperatura',
      //'range' => '35.0-38.0',
      'name' => 'Pulso cardiaco',
      'range' => '60-100',
    ];
    return $array;
});

$factory->define(App\Notification::class, function(Generator $faker){

    $array = [
      'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
      'type' => $faker->randomElement($array = array ('Urgente','Normal')),
      'user_id' => 1,
    ];
    return $array;
});


$factory->define(App\Measure::class, function(Generator $faker){
date_default_timezone_set("America/Mexico_City");
    $array = [
      'value' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 35, $max = 38) ,
      'date' => date("Y/m/d") ,
      'time' => date("h:i:s"),
      'variable_id' => $faker->randomElement($array = array (1,2)),

    ];
    return $array;
});
