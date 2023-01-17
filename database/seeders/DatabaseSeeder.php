<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

       /*  User::factory()->create([

        [
            'nom_complet' => 'Administrateur',
            'email' => 'admin@app.com',
            'fonction' => 'admin',
            'password' => '$2y$10$AReWOmGb1DFH4N.IAkfAquSYfemm6DcPUfpEAux9DpqRcolwnp7im', //password
            'photo_profil' => 'url',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
            'nom_complet' => 'Recouvreur',
            'email' => 'recouvreur@app.com',
            'fonction' => 'recouvreur',
            'password' => '$2y$10$AReWOmGb1DFH4N.IAkfAquSYfemm6DcPUfpEAux9DpqRcolwnp7im', //password
            'photo_profil' => 'url',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
            'nom_complet' => 'Comptable',
            'email' => 'comptable@app.com',
            'fonction' => 'comptable',
            'password' => '$2y$10$AReWOmGb1DFH4N.IAkfAquSYfemm6DcPUfpEAux9DpqRcolwnp7im', //password
            'photo_profil' => 'url',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]
         
    ]); */
    }
}
