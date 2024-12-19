<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    /** @use HasFactory<\Database\Factories\EstadoCivilFactory> */
    use HasFactory;

    /**
     * Gestiona las marcas de tiempo (Fecha de creación y actualización).
     *
     * @var boolean $timestamps
     */
    public $timestamps = true;
    /**
     * Nombre de la tabla de datos para este modelo.
     *
     * @var string $table
     */
    protected $table = 'estados_civiles';
    /**
     * Nombre de la llave primaria de la tabla de datos.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id_estado_civil';
    /**
     * Atributos que pueden ser asignados en masa.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'nombre'
    ];

}
