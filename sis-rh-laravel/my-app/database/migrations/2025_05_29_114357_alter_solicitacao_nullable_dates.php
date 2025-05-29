<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('solicitacao', function (Blueprint $table) {
        $table->date('data_inicio')->nullable()->change();
        $table->date('data_fim')->nullable()->change();
    });
}

public function down()
{
    Schema::table('solicitacao', function (Blueprint $table) {
        $table->date('data_inicio')->nullable(false)->change();
        $table->date('data_fim')->nullable(false)->change();
    });
}

};
