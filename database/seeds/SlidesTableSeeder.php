<?php

use App\Slide;
use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::insert([
            [
                'image' => '/images/slider-1.png',
                'position' => 1
            ],
            [
                'image' => '/images/default-header.jpeg',
                'position' => 1
            ],
        ]);
    }
}
