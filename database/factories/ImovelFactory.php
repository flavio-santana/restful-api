<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Pessoa;
use App\Model\Imovel;
use Faker\Generator as Faker;

$factory->define(Imovel::class, function (Faker $faker) {
    return [
        //

        'pessoa_id' => function (){

            return Pessoa::all()->random();
        
        },

        'endereco' => $faker->streetName,

        'numero' => $faker->buildingNumber,   

        'complemento' => $faker->secondaryAddress, 

        'cep' => $faker->postcode,

        'bairro' => $faker->numberBetween(0,1),

        'cidade' => $faker->city,
        
        'uf' => $faker->stateAbbr,

        'descricao' => $faker->text,

        'desativado' => $faker->numberBetween(0,1),

    ];
});
