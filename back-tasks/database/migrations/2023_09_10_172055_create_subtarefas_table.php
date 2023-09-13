<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtarefasTable extends Migration
{
    public function up()
    {
        Schema::create('subtarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('id_tarefa')->constrained('tarefas');
            $table->longText('descricao');
            $table->enum('status', ['Pending', 'Complete']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subtarefas');
    }
}
