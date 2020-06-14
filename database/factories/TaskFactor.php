<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title'=>$faker->realText(rand(10,40)),
        'descr'=>$faker->realText(rand(100,400)),
        'status'=>"Новое",

    ];
});
