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
        ]);
    }
}
