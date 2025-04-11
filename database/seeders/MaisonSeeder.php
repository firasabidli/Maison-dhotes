<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maison;
class MaisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maisons = [
            [
                'nom' => 'Maison Bleue',
                'description' => 'Belle maison vue sur mer',
                'adresse' => 'Rue de la Plage',
                'ville' => 'Hammamet',
                'prix_par_nuit' => 180.00,
                'capacite' => 4,
                'disponible' => true,
                'category_id' => 1,
                'user_id' => 1,
                'images' => ['maison1.jpg', 'maison2.jpg'],
            ],
            [
                'nom' => 'Villa Palmier',
                'description' => 'Confort et luxe avec piscine',
                'adresse' => 'Zone touristique',
                'ville' => 'Djerba',
                'prix_par_nuit' => 250.00,
                'capacite' => 6,
                'disponible' => true,
                'category_id' => 2,
                'user_id' => 1,
                'images' => ['villa1.jpg'],
            ],
            [
                'nom' => 'Maison Jardin',
                'description' => 'Charmante maison avec grand jardin',
                'adresse' => 'Avenue des fleurs',
                'ville' => 'Bizerte',
                'prix_par_nuit' => 100.00,
                'capacite' => 3,
                'disponible' => false,
                'category_id' => 1,
                'user_id' => 1,
                'images' => ['jardin1.jpg', 'jardin2.jpg'],
            ],
            [
                'nom' => 'Dar Traditionnelle',
                'description' => 'Maison typique tunisienne',
                'adresse' => 'Medina',
                'ville' => 'Tunis',
                'prix_par_nuit' => 120.00,
                'capacite' => 5,
                'disponible' => true,
                'category_id' => 3,
                'user_id' => 1,
                'images' => ['dar1.jpg'],
            ],
            [
                'nom' => 'Résidence Soleil',
                'description' => 'Appartement lumineux',
                'adresse' => 'Boulevard central',
                'ville' => 'Sousse',
                'prix_par_nuit' => 90.00,
                'capacite' => 2,
                'disponible' => true,
                'category_id' => 2,
                'user_id' => 1,
                'images' => ['soleil1.jpg'],
            ],
        ];

        foreach ($maisons as $maison) {
            Maison::create($maison);
        }
    }
}
