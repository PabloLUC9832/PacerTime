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
        Schema::create('competidors', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('apellido');
            $table->text('telefono');
            $table->text('telefonoEmergencia')->nullable();

            $table->foreignId('sub_evento_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competidors');
    }
};
