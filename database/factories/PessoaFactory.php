<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Pessoa;
use Faker\Generator as Faker;

$factory->define(Pessoa::class, function (Faker $faker) {
    return [
        //

        'nome' => $faker->name, 
        
        'dataNascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),

        'sexo' => $faker->randomElement($array = array ('M','F')),  

        'email' => $faker->email, 

        'telefone' => $faker->tollFreePhoneNumber,
        
        'desativado' => $faker->numberBetween(0,1),
         
    ];
});
