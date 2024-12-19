<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    /** @use HasFactory<\Database\Factories\GeneroFactory> */
    use HasFactory;
    /**
     * Nombre de la llave primaria de la tabla de datos.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id_genero';
     /**
     * Atributos que pueden ser asignados en masa.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'nombre'
    ];
}
