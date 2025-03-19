<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materias extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre',
        'descripcion'
    ];

    public function notas():HasMany{
        return $this->hasMany(Notas::class, 'materia_id'); 
    }
}
