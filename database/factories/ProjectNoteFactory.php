<?php

use Faker\Generator as Faker;

$factory->define(CodeProject\Entities\Cadastros\ProjectNote::class, function (Faker $faker) {
    return [
        'project_id'=>$faker->numberBetween(1, 100),
        'titulo'=>$faker->word,
        'nota'=>$faker->paragraph
    ];
});
