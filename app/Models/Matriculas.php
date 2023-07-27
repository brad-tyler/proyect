<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Matriculas extends Pivot
{
    use HasFactory;

    protected $table =  'matriculas';

    public function trabajos()
    {
        return $this->belongsToMany(Trabajos::class, 'tareas', 'matricula_id','trabajo_id')
        ->using(Tareas::class);
    }
}