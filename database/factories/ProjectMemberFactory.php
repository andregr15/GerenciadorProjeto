<?php

use Faker\Generator as Faker;

$factory->define(CodeProject\Entities\Cadastros\ProjectMember::class, function (Faker $faker) {
    return [
        'project_id'=>$faker->numberBetween(1, 100),
        'user_id'=>$faker->numberBetween(1, 4)
    ];
});
