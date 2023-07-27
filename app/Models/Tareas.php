<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Tareas extends Pivot
{
    use HasFactory;

    protected $table =  'tareas';

    public function revisions()
    {
        return $this->hasMany(Revisiones::class, 'tarea_id','id');
    }
}