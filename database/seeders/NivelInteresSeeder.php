<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NivelInteres;

class NivelInteresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preparatoria = NivelInteres::create([
            'nombre' => 'Preparatoria',
        ]);
        
        $licenciatura = NivelInteres::create([
            'nombre' => 'Licenciatura',
        ]);

        $posgrado = NivelInteres::create([
            'nombre' => 'Posgrado',
        ]);

        $licenciatura->carreras()->createMany([
            ['nombre' => 'Lic. En Derecho'],
            ['nombre' => 'Lic. En Finanzas'],
        ]);

        $posgrado->carreras()->createMany([
            ['nombre' => 'Mtria. Admon. De Negocios'],
            ['nombre' => 'Mtria. Dirección de Proyectos'],
        ]);
    }
}
