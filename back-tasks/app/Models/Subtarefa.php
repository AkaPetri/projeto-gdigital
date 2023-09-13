<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtarefa extends Model
{
    protected $table = 'subtarefas';

    protected $fillable = [
        'titulo',
        'id_tarefa',
        'descricao',
        'status',
    ];

    public function tarefa()
    {
        return $this->belongsTo(Tarefa::class, 'id_tarefa');
    }
}
