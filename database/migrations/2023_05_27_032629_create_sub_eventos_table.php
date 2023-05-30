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
        Schema::create('sub_eventos', function (Blueprint $table) {
            $table->id();
            $table->text('distancia');
            $table->text('categoria');
            $table->float('precio',6,2);
            $table->text('rama');

            $table->foreignId('evento_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_eventos');
    }
};
