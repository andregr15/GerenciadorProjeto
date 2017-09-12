<?php

use Faker\Generator as Faker;

$factory->define(CodeProject\Entities\Cadastros\ProjectTask::class, function (Faker $faker) {
    return [
        'project_id'=>$faker->numberBetween(1, 100),
        'nome'=>$faker->word,
        'data_inicio'=>$faker->date(),
        'data_vencimento'=>$faker->date(),
        'status'=>$faker->randomElement(['Aberta', 'Em Andamento', 'Finalizada'])
    ];
});
