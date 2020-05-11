<?php

use App\Book;
use App\BookCard;
use App\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Book::class, 21)
            ->create()
            ->each($this->attachCategories())
            ->each($this->createCardFromBook());
    }

    protected function createCardFromBook()
    {
        return function(Book $book) {
            BookCard::createFromBook($book);
        };
    }

    protected function attachCategories()
    {
        $categories = Category::getLibraryCategories();

        $faker = Faker::create();

        return function(Book $book) use ($categories, $faker) {
            $book->categories()->attach($faker->randomElement($categories, random_int(1, 5)));
        };
    }
}
