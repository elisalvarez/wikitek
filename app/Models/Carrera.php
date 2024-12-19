<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    /** @use HasFactory<\Database\Factories\CarreraFactory> */
    use HasFactory;

     /**
     * Nombre de la llave primaria de la tabla de datos.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id_carrera';
    /**
     * Atributos que pueden ser asignados en masa.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'nombre',
        'id_nivel_interes'
    ];
}
