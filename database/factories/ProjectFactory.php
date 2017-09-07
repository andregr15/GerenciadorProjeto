<?php

use Faker\Generator as Faker;

$factory->define(CodeProject\Entities\Cadastros\Project::class, function (Faker $faker) {
    return [
        'nome'=>$faker->name,
        'descricao'=>$faker->sentence,
        'progresso'=>$faker->numberBetween(0, 100),
        'status'=>$faker->randomElement(['Para fazer', 'Sendo feito', 'Revisão', 'Pronto']),
        'data_vencimento'=>$faker->date('Y-m-d'),
        'owner_id'=>$faker->numberBetween(1,4),
        'client_id'=>$faker->numberBetween(1, 30)
    ];
});
