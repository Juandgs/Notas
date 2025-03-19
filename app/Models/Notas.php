<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notas extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'materia_id',
        'profesor_id',
        'nota',
        'fecha_registro'
    ];

    public function profesores():BelongsTo{
        return $this->belongsTo(Profesores::class, 'profesor_id');
    }
    public function materias():BelongsTo{
        return $this->belongsTo(Materias::class, 'materia_id');
    }
    public function estudiantes():BelongsTo{
        return $this->belongsTo(Estudiantes::class, 'estudiante_id');
    }
}
