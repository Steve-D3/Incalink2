<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /** @use HasFactory<\Database\Factories\PersonaFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'edad',
        'sexo',
        'cedula',
        'telefono',
        'alergias',
        'alergias_varias',
        'observaciones',
    ];

    protected $casts = [
        'nombre' => 'string',
        'edad' => 'integer',
        'sexo' => 'string',
        'cedula' => 'integer',
        'telefono' => 'integer',
        'alergias' => 'string',
        'alergias_varias' => 'string',
        'observaciones' => 'string',
    ];

    // Relaciones
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id', 'id');
    }
}
