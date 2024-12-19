<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadoCivil;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estadosCiviles = [
            'Soltero',
            'Casado',
            'Viudo',
            'Separado',
            'Divorciado'
        ];
    
        foreach ($estadosCiviles as $estadoCivil) {
            EstadoCivil::create(['nombre' => $estadoCivil]);
        }
    }
}
