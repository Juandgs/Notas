<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesores extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo'
    ];

    public function notas():HasMany{
        return $this->hasMany(Notas::class, 'profesor_id');
    }
}
