<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajos extends Model
{
    use HasFactory;


    public function curso()
    {
        return $this->belongsTo(Cursos::class);
    }

    public function matriculas()
    {
        return $this->belongsToMany(Matriculas::class, 'tareas','trabajo_id','matricula_id')
        ->using(Tareas::class);
    }
}