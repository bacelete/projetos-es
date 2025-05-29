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
        Schema::create('solicitacao', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->unsignedBigInteger("id_servidor"); 
            $table->unsignedBigInteger("id_gestor"); 
            $table->string("unidade");
            $table->string("motivo");
            $table->string("observacao");
            $table->date("data_inicio");
            $table->date("data_fim");
            $table->dateTime("data_solicitacao")->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacao');
    }
};
