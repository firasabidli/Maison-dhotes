<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\Maison;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $maisons = Maison::all();
        $clients = User::all();

        if ($maisons->count() == 0 || $clients->count() == 0) {
            $this->command->info('Aucune maison ou client trouvé. Seeder annulé.');
            return;
        }

        foreach (range(1, 10) as $i) {
            $maison = $maisons->random();
            $client = $clients->random();

            $dateDebut = Carbon::now()->addDays(rand(1, 30));
            $dateFin = (clone $dateDebut)->addDays(rand(1, 7));

            Reservation::create([
                'maison_id' => $maison->id,
                'client_id' => $client->id,
                'date_debut' => $dateDebut,
                'date_fin' => $dateFin,
                'nombre_personnes' => rand(1, $maison->capacite),
                'statut' => collect(['en attente', 'confirmée', 'annulée', 'refusée'])->random(),
                'is_paid' => rand(0, 1),
            ]);
        }
    }
}
