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
        $htmlBasePath = base_path('database/seeds/pages/');

        Page::insert([
            [
                'name' => $name = 'biblioteca',
                'slug' => Str::slug($name),
                'content' => '',
                'image' => '/images/biblioteca.png'
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
                'content' => file_get_contents("{$htmlBasePath}{$name}.html"),
                'image' => '/images/fachada.jpeg'
            ],
            [
                'name' => $name = 'equipo',
                'slug' => Str::slug($name),
                'content' => file_get_contents("{$htmlBasePath}{$name}.html"),
                'image' => '/images/default-header.jpeg'
            ],
            [
                'name' => $name = 'prensa',
                'slug' => Str::slug($name),
                'content' => file_get_contents("{$htmlBasePath}{$name}.html"),
                'image' => '/images/default-header.jpeg'
            ],
        ]);
    }
}
