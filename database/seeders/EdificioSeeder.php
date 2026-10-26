<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\Edificio;
use Illuminate\Database\Seeder;

class EdificioSeeder extends Seeder
{
    /**
     * Edificio C del campus con sus aulas C1 ... C5.
     */
    public function run(): void
    {
        $edificioC = Edificio::firstOrCreate(['nombre' => 'Edificio C']);

        foreach (['C1', 'C2', 'C3', 'C4', 'C5'] as $nombre) {
            $aula = Aula::firstOrNew(['nombre' => $nombre]);
            $aula->capacidad = $aula->capacidad ?? 30;
            $aula->wifi = $aula->wifi ?? true;
            $aula->edificio_id = $edificioC->id;
            $aula->save();
        }
    }
}
