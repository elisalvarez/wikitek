<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelInteres extends Model
{
    /** @use HasFactory<\Database\Factories\NivelInteresFactory> */
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
    protected $table = 'niveles_interes';
    /**
     * Nombre de la llave primaria de la tabla de datos.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id_nivel_interes';
    /**
     * Atributos que pueden ser asignados en masa.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'nombre'
    ];

     public function carreras()
     {
        return $this->hasMany(Carrera::class, 'id_nivel_interes');
     }
}
