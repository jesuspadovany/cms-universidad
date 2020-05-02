<?php

use App\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::insert([
            [
                'name' => $name = 'biblioteca',
                'slug' => Str::slug($name),
                'content' => '',
                'image' => '/images/default-header.jpeg'
            ],
            [
                'name' => $name = 'cursos',
                'slug' => Str::slug($name),
                'content' => '',
                'image' => '/images/default-header.jpeg'
            ],
            [
                'name' => $name = 'institucional',
                'slug' => Str::slug($name),
                'content' => '',
                'image' => '/images/default-header.jpeg'
            ],
            [
                'name' => $name = 'equipo',
                'slug' => Str::slug($name),
                'content' => '',
                'image' => '/images/default-header.jpeg'
            ],
            [
                'name' => $name = 'prensa',
                'slug' => Str::slug($name),
                'content' => '',
                'image' => '/images/default-header.jpeg'
            ],
        ]);
    }
}
