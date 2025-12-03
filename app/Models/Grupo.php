<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_de_llegada',
        'fecha_de_salida',
    ];

    protected $casts = [
        'nombre' => 'string',
        'fecha_de_llegada' => 'datetime:Y-m-d H:i',
        'fecha_de_salida' => 'datetime:Y-m-d H:i',
    ];

    // Relaciones
    public function personas()
    {
        return $this->hasMany(Persona::class, 'grupo_id', 'id');
    }
}
