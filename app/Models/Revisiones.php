<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisiones extends Model
{
    use HasFactory;

    public function tarea()
    {
        return $this->belongsTo(Tareas::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estados::class);
    }

    public function comentarios()
    {
        return $this->hasMany(comentarios::class);
    }
}