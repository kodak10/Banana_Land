<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plats = [
            [
                'nom' => 'Foutou',
                'image' => 'https://cdn.pixabay.com/photo/2016/12/06/18/27/milk-1887234__340.jpg',
            ],
            [
                'nom' => 'Attieke',
                'image' => 'https://cdn.pixabay.com/photo/2016/07/23/15/24/egg-1536990__340.jpg',
            ],
            [
                'nom' => 'Riz',
                'image' => 'https://cdn.pixabay.com/photo/2015/11/07/12/00/alcohol-1031713__340.png',
            ],
        ];
        Categorie::insert($plats);
    }
}
