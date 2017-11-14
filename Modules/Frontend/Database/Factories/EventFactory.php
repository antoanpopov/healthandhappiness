<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 1.11.2017 г.
 * Time: 23:01
 */
use Faker\Generator as Faker;

$factory->define(\Modules\Frontend\Entities\Event::class, function (Faker $faker) {


    return [
        'is_published' => true,
        'author_id' => 1,
        'created_by' => 1,
        'organizer:bg' => $faker->name(),
        'organizer:en' => $faker->name(),
        'lector:bg' => 'Д-р Светлана Попова',
        'lector:en' => 'Dr Svetlana Popova',
        'price:bg' => rand(20,150),
        'price:en' => rand(20,150),
        'location:bg' => $faker->streetAddress,
        'location:en' => $faker->streetAddress,
        'held_at' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'))->addDays(rand(1,100)),
        'abstract:bg' => $faker->text(150),
        'content:bg' => $faker->text(3000),
        'title:en' => $faker->text(190),
        'title:bg' => $faker->text(190),
        'abstract:en' => $faker->text(150),
        'content:en' => $faker->text(3000),
    ];
});
