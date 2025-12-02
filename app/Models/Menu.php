<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    protected $casts = [
        'receta_id' => 'integer',
    ];

    // Relaciones
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
}
