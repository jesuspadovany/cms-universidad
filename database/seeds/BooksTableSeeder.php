<?php

use App\Book;
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
        Book::create([
            'title' => 'titulo',
            'slug' => 'titulo',
            'description' => 'descripcion',
            'is_free' => 1,
            'price' => 0,
            'author' => 'Pedro perez',
            'num_of_pages' => 500,
            'published_at' => now(),
            'image' => 'images/book-default-image.png',
            'is_electronic' => 0,
            'location' => 'Biblioteca UBA',
            'file' => null
        ]);
    }
}
