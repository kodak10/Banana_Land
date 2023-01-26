<?php

namespace Database\Seeders;

use App\Models\plat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatSeeder extends Seeder
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
                'nom' => 'Foutou Banane',
                'description' => 'lorem ipsum',
                'prix' => 1000,
                'images' => 'https://cdn.pixabay.com/photo/2015/08/20/20/07/cereal-898073_960_720.jpg',
                'disponible' => 'Oui',
                'categories_id' => '1',
            ],
            [
                'nom' => 'Foutou Igname',
                'description' => 'lorem ipsum',
                'prix' => 1300,
                'images' => 'https://cdn.pixabay.com/photo/2017/10/09/19/29/eat-2834549_960_720.jpg',
                'disponible' => 'Oui',
                'categories_id' => '1',
            ],
            [
                'nom' => 'Attieke Poisson',
                'description' => 'lorem ipsum',
                'prix' => 1500,
                'images' => 'https://cdn.pixabay.com/photo/2014/11/05/15/57/salmon-518032_960_720.jpg',
                'disponible' => 'Oui',
                'categories_id' => '2',
            ],
            [
                'nom' => 'Foutou banane',
                'description' => 'lorem ipsum',
                'prix' => 1000,
                'image' => 'https://cdn.pixabay.com/photo/2016/11/23/18/31/pasta-1854245_960_720.jpg',
                'disponible' => 'Non',
                'categories_id' => '2',
            ]
        ];
        plat::insert($plats);
    }
}
