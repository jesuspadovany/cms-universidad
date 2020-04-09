<?php

use App\Page;
use Illuminate\Database\Seeder;

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
                'name' => 'biblioteca',
                'image' => 'https://images3.alphacoders.com/975/thumb-1920-975999.png'
            ],
            [
                'name' => 'cursos',
                'image' => 'https://steamuserimages-a.akamaihd.net/ugc/940586530515504757/CDDE77CB810474E1C07B945E40AE4713141AFD76/'
            ],
        ]);
    }
}
