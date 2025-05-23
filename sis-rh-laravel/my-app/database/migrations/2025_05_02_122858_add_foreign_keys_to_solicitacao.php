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
        Schema::table('solicitacao', function (Blueprint $table) {
            $table->foreign("id_servidor")->references("id")->on("servidor"); 
            $table->foreign("id_gestor")->references("id")->on("gestor"); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitacao', function (Blueprint $table) {
            //
        });
    }
};
