<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genereos = [
            'Femenino',
            'Masculino',
            'Otro',
            'Prefiero no decirlo'
        ];
    
        foreach ($genereos as $genero) {
            Genero::create(['nombre' => $genero]);
        }
    }
}
