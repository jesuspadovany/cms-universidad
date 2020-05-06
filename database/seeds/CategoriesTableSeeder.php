<?php

use App\Category;
use App\Constants\CategoryModules;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => $name = 'libros',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'idiomas',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'revistas',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'novelas',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'ensayos',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'historia',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'manuales',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'vidas',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'educación',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'memorias',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'drama',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'extramuros',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'ciencias',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'infantiles',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'juveniles',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'ficción',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            [
                'name' => $name = 'no ficción',
                'slug' => Str::slug($name),
                'module' => CategoryModules::LIBRARY,
            ],
            //CURSOS
            [
                'name' => $name = 'Culturas Populares',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Educación',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Idiomas',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Informatica',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Letras',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Orificios',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Turismo',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Administración',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Ciencia',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Cultura Sostenible',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Gratis',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Arancelado',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Danza',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Musica',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Tango',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Folklore',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Danzas Etnicas',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Cine y Video',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Arte',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Fotografia',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Diseño',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Niños',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Mayores de 18',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Adultos Mayores',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
            [
                'name' => $name = 'Teatro',
                'slug' => Str::slug($name),
                'module' => CategoryModules::COURSES,
            ],
        ]);
    }
}
