<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 1.11.2017 г.
 * Time: 23:01
 */
use Faker\Generator as Faker;

$factory->define(\Modules\Frontend\Entities\Category::class, function (Faker $faker) {


    return [
        'is_published' => true,
        'author_id' => 1,
        'created_by' => 1,
        'title:bg' => $faker->text(190),
        'abstract:bg' => $faker->text(150),
        'content:bg' => $faker->text(3000),
        'title:en' => $faker->text(190),
        'abstract:en' => $faker->text(150),
        'content:en' => $faker->text(3000),
    ];
});
