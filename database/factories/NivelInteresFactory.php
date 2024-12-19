<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NivelInteres>
 */
class NivelInteresFactory extends Factory
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

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
}
