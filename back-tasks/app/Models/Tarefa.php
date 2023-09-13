<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tarefa;

class Tarefa extends Model
{
    protected $table = 'tarefas';

    protected $fillable = [
        'titulo',
        'descricao',
        'data_vencimento',
        'status',
    ];

    public function subtarefas()
    {
    return $this->hasMany(Subtarefa::class, 'id_tarefa');
    }
    
}



