<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Replay;
use Faker\Generator as Faker;
use App\Model\Question;

$factory->define(Replay::class, function (Faker $faker) {
    return [
      'body' =>$faker->text,
      'question_id'=>function(){
        return Question::all()->random();
      },
      'user_id'=>function(){
        return \App\User::all()->random();
      }
    ];
});
