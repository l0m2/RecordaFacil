<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('tituloTarefa');
            $table->text('descricaoTarefa')->nullable();
            $table->date('dataConclusao');
            $table->enum('prioridade', ['Baixa', 'Media', 'Alta'])->default('Baixa');
            $table->enum('categoria', ['Trabalho', 'Estudo', 'Pessoal', 'Saúde', 'Outros'])->default('Outros');
            $table->text('notas')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->cascadeOnUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
