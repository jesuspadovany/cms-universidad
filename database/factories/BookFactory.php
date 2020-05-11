<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $title = $faker->sentence(random_int(2, 5)),
        'slug' => Str::slug($title),
        'synopsis' => $faker->text(1000),
        'is_free' => $isFree = random_int(0, 1),
        'price' => $isFree === 1 ? 0 : $faker->randomFloat(2, 500, 4000),
        'author' => $faker->name,
        'num_of_pages' => random_int(80, 1500),
        'published_at' => $faker->datetime(),
        'image' => 'images/book-default-image.png',
        'is_electronic' => 0,
        'location' => 'Biblioteca UBA',
        'file' => null
    ];
});
