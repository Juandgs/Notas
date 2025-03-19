<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estudiantes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'fecha_nacimiento'
    ];

    public function notas():HasMany{
        return $this->hasMany(Notas::class, 'estudiante_id');
    }
}
