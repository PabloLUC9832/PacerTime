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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('descripcion');
            $table->text('lugarEvento');
            $table->text('fechaInicioEvento');
            $table->text('fechaFinEvento');
            $table->text('horaEvento');
            $table->text('lugarEntregaKits');
            $table->text('fechaInicioEntregaKits');
            $table->text('fechaFinEntregaKits');
            $table->text('horaInicioEntregaKits');
            $table->text('horaFinEntregaKits');
            $table->text('imagen');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
